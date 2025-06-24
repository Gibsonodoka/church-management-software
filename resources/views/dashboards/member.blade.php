@extends('layouts.app')

@section('title', 'Member Dashboard')

@section('content')
    <div class="dashboard-content">
        <h1>Member Dashboard</h1>
        <p>Welcome, {{ auth()->user()->name }}!</p>
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