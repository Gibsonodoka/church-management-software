<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Visitor;
use App\Models\Attendance;
use App\Models\ChurchEvent;
use App\Models\Income;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $stats = [
            'members' => Schema::hasTable('members') ? Member::count() : 0,
            'visitors' => Schema::hasTable('visitors') ? Visitor::count() : 0,
            'recent_visitors' => Schema::hasTable('visitors') ? Visitor::orderBy('created_at', 'desc')->take(5)->get() : [],
            'upcoming_events' => Schema::hasTable('church_events') ? ChurchEvent::where('start', '>=', now())->take(5)->get() : [],
            'recent_attendance' => Schema::hasTable('attendance') ? Attendance::orderBy('date', 'desc')->take(5)->get() : [],
            'total_income' => Schema::hasTable('incomes') ? Income::sum('amount') : 0,
            'total_expenses' => Schema::hasTable('expenses') ? Expense::sum('amount') : 0,
        ];

        if ($user->hasRole('Admin') || $user->hasRole('Senior Pastor')) {
            return view('dashboards.admin', compact('stats'));
        } elseif ($user->hasRole('Pastor')) {
            return view('dashboards.pastor', compact('stats'));
        } elseif ($user->hasRole('Team Lead')) {
            return view('dashboards.team_lead', compact('stats'));
        } elseif ($user->hasRole('Member')) {
            return view('dashboards.member', compact('stats'));
        }

        return redirect()->route('login')->with('error', 'Unauthorized access');
    }
}