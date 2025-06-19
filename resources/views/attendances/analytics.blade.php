@extends('layouts.app')

@section('title', 'Attendance Analytics')

@section('content')
    <h1>Attendance Analytics</h1>
    <h2>Member Growth</h2>
    <table>
        <thead>
            <tr>
                <th>Month</th>
                <th>Total Attendance</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($memberGrowth as $growth)
                <tr>
                    <td>{{ $growth->month }}</td>
                    <td>{{ $growth->total_attendance }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h2>Demographics</h2>
    <table>
        <thead>
            <tr>
                <th>Month</th>
                <th>Men</th>
                <th>Women</th>
                <th>Youth</th>
                <th>Teens</th>
                <th>Children</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($demographics as $demo)
                <tr>
                    <td>{{ $demo->month }}</td>
                    <td>{{ $demo->men }}</td>
                    <td>{{ $demo->women }}</td>
                    <td>{{ $demo->youth }}</td>
                    <td>{{ $demo->teens }}</td>
                    <td>{{ $demo->children }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('attendances.index') }}">Back to Attendance</a>
@endsection