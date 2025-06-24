@extends('layouts.app')

@section('title', 'Team Lead Dashboard')

@section('content')
    <div class="dashboard-content">
        <h1>Team Lead Dashboard</h1>
        <p>Welcome, {{ auth()->user()->name }}!</p>
        <div class="stats">
            <h3>Team Overview</h3>
            <ul>
                <li>Upcoming Events: {{ $stats['upcoming_events']->count() }}</li>
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