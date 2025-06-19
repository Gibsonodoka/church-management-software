<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // Public view (read-only)
    public function publicIndex()
    {
        $departments = Department::where('is_active', true)->get();
        return view('departments.index', compact('departments'));
    }

    // Admin index view
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments|string|max:255',
            'is_active' => 'boolean'
        ]);

        Department::create([
            'name' => $request->name,
            'is_active' => $request->is_active ?? true
        ]);

        return redirect()->route('departments.index')->with('success', 'Department created successfully');
    }

    public function show($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.show', compact('department'));
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:departments,name,' . $id,
            'is_active' => 'boolean'
        ]);

        $department->update([
            'name' => $request->name,
            'is_active' => $request->is_active ?? $department->is_active
        ]);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully');
    }
}
