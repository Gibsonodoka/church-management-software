@extends('layouts.app')

@section('title', 'Pastor Dashboard')

@section('content')
    <div class="dashboard-content">
        <h1>Pastor Dashboard</h1>
        <p>Welcome, {{ auth()->user()->name }}!</p>
        <div class="stats">
            <h3>Ministry Overview</h3>
            <ul>
                <li>Total Members: {{ $stats['members'] }}</li>
                <li>Recent Visitors: {{ $stats['recent_visitors']->count() }}</li>
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
    </div>
@endsection