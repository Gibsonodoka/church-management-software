<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::all();
        return view('incomes.index', compact('incomes'));
    }

    public function create()
    {
        return view('incomes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'source' => 'required|string',
            'amount' => 'required|numeric',
            'date_received' => 'required|date',
            'payment_method' => 'required|string',
        ]);

        Income::create($request->all());

        return redirect()->route('incomes.index')->with('success', 'Income recorded successfully');
    }

    public function edit($id)
    {
        $income = Income::findOrFail($id);
        return view('incomes.edit', compact('income'));
    }

    public function update(Request $request, $id)
    {
        $income = Income::findOrFail($id);
        $request->validate([
            'source' => 'sometimes|required|string',
            'amount' => 'sometimes|required|numeric',
            'date_received' => 'sometimes|required|date',
            'payment_method' => 'sometimes|required|string',
        ]);

        $income->update($request->all());

        return redirect()->route('incomes.index')->with('success', 'Income updated successfully');
    }

    public function destroy($id)
    {
        $income = Income::findOrFail($id);
        $income->delete();

        return redirect()->route('incomes.index')->with('success', 'Income record deleted successfully');
    }
}