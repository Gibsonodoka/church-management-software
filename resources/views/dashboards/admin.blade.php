@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Admin Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}!</p>
    <div class="stats">
        <h3>Church Statistics</h3>
        <ul>
            <li>Total Members: {{ $stats['members'] }}</li>
            <li>Total Visitors: {{ $stats['visitors'] }}</li>
            <li>Total Income: ${{ $stats['total_income'] }}</li>
            <li>Total Expenses: ${{ $stats['total_expenses'] }}</li>
        </ul>
    </div>
    <div class="recent-visitors">
        <h3>Recent Visitors</h3>
        <ul>
            @foreach ($stats['recent_visitors'] as $visitor)
                <li>{{ $visitor->firstname }} {{ $visitor->lastname }} - {{ $visitor->created_at->format('Y-m-d') }}</li>
            @endforeach
        </ul>
    </div>
    <div class="upcoming-events">
        <h3>Upcoming Events</h3>
        <ul>
            @foreach ($stats['upcoming_events'] as $event)
                <li>{{ $event->title }} - {{ $event->start->format('Y-m-d H:i') }}</li>
            @endforeach
        </ul>
    </div>
@endsection