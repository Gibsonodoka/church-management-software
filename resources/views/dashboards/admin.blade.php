@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="dashboard-content">
        <h1 class="dashboard-title">Admin Dashboard</h1>
        <p class="dashboard-welcome">Welcome back, {{ auth()->user()->name }}! Here's what's happening with your church today.</p>
        
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Total Members
                </div>
                <div class="stat-card-value">{{ $stats['members'] }}</div>
                <div class="stat-card-change positive">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    +5% from last month
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    Total Visitors
                </div>
                <div class="stat-card-value">{{ $stats['visitors'] }}</div>
                <div class="stat-card-change positive">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    +12% from last week
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Total Income
                </div>
                <div class="stat-card-value">${{ number_format($stats['total_income'], 2) }}</div>
                <div class="stat-card-change positive">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    +8% from last month
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Total Expenses
                </div>
                <div class="stat-card-value">${{ number_format($stats['total_expenses'], 2) }}</div>
                <div class="stat-card-change negative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                    -3% from last month
                </div>
            </div>
        </div>
        
        <div class="recent-section">
            <h3 class="section-title">Recent Visitors</h3>
            <div class="recent-table">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Visit Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stats['recent_visitors'] as $visitor)
                        <tr>
                            <td>{{ $visitor->firstname }} {{ $visitor->lastname }}</td>
                            <td>{{ $visitor->phone ?? 'N/A' }}</td>
                            <td>{{ $visitor->email ?? 'N/A' }}</td>
                            <td>{{ $visitor->created_at->format('M d, Y') }}</td>
                            <td><span class="badge badge-primary">New</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="recent-section mt-8">
            <h3 class="section-title">Upcoming Events</h3>
            <div class="recent-table">
                <table>
                    <thead>
                        <tr>
                            <th>Event</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Attendees</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stats['upcoming_events'] as $event)
                        <tr>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->start->format('M d, Y H:i') }}</td>
                            <td>{{ $event->location ?? 'Main Sanctuary' }}</td>
                            <td>{{ $event->attendees_count ?? 0 }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection