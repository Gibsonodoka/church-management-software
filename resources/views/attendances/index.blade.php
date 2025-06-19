@extends('layouts.app')

@section('title', 'Attendance Records')

@section('content')
    <h1>Attendance Records</h1>
    <a href="{{ route('attendances.create') }}">Add Attendance</a>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Service Description</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->date->format('Y-m-d') }}</td>
                    <td>{{ $attendance->service_description }}</td>
                    <td>{{ $attendance->total }}</td>
                    <td>
                        <a href="{{ route('attendances.edit', $attendance->id) }}">Edit</a>
                        <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('attendances.analytics') }}">View Analytics</a>
@endsection