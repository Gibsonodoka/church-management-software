<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::latest()->paginate(20);
        return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        return view('attendances.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'month' => 'required|string',
            'service_description' => 'required|string',
            'men' => 'required|integer|min:0',
            'women' => 'required|integer|min:0',
            'youth' => 'required|integer|min:0',
            'teens' => 'required|integer|min:0',
            'children' => 'required|integer|min:0',
            'total' => 'required|integer|min:0',
        ]);

        Attendance::create($validated);

        return redirect()->route('attendances.index')->with('success', 'Attendance record added successfully');
    }

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        return view('attendances.edit', compact('attendance'));
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);

        $validated = $request->validate([
            'date' => 'sometimes|required|date',
            'month' => 'sometimes|required|string',
            'service_description' => 'sometimes|required|string',
            'men' => 'sometimes|required|integer|min:0',
            'women' => 'sometimes|required|integer|min:0',
            'youth' => 'sometimes|required|integer|min:0',
            'teens' => 'sometimes|required|integer|min:0',
            'children' => 'sometimes|required|integer|min:0',
            'total' => 'sometimes|required|integer|min:0',
        ]);

        $attendance->update($validated);

        return redirect()->route('attendances.index')->with('success', 'Attendance record updated successfully');
    }

    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('attendances.index')->with('success', 'Attendance record deleted successfully');
    }

    public function analytics()
    {
        // PostgreSQL-compatible queries
        $memberGrowth = DB::table('attendances')
            ->selectRaw("TO_CHAR(date, 'YYYY-MM') AS month, SUM(total) AS total_attendance")
            ->groupByRaw("TO_CHAR(date, 'YYYY-MM')")
            ->orderByRaw("TO_CHAR(date, 'YYYY-MM')")
            ->get();

        $demographics = DB::table('attendances')
            ->selectRaw("TO_CHAR(date, 'YYYY-MM') AS month,
                         SUM(men) AS men,
                         SUM(women) AS women,
                         SUM(youth) AS youth,
                         SUM(teens) AS teens,
                         SUM(children) AS children")
            ->groupByRaw("TO_CHAR(date, 'YYYY-MM')")
            ->orderByRaw("TO_CHAR(date, 'YYYY-MM')")
            ->get();

        return view('attendances.analytics', compact('memberGrowth', 'demographics'));
    }
}
