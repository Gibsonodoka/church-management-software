@extends('layouts.app')

@section('title', 'Member Birthdays')

@section('content')
    <h1>Member Birthdays</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Day</th>
                <th>Month</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($birthdays as $birthday)
                <tr>
                    <td>{{ $birthday['name'] }}</td>
                    <td>{{ $birthday['day'] }}</td>
                    <td>{{ $birthday['month'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection