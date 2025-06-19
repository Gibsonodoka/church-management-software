@extends('layouts.app')

@section('title', 'Church Events')

@section('content')
    <h1>Church Events</h1>
    <a href="{{ route('events.create') }}">Add Event</a>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Start</th>
                <th>End</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->start->format('Y-m-d H:i') }}</td>
                    <td>{{ $event->end->format('Y-m-d H:i') }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                        <a href="{{ route('events.edit', $event->id) }}">Edit</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection