@extends('layouts.app')

@section('title', 'Senior Pastor Dashboard')

@section('content')
    <h1>Senior Pastor Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}!</p>
    <div class="stats">
        <h3>Church Overview</h3>
        <ul>
            <li>Total Members: {{ $stats['members'] }}</li>
            <li>Recent Attendance: {{ $stats['recent_attendance']->first()->total ?? 0 }}</li>
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