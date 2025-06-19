@extends('layouts.app')

@section('title', 'Income Records')

@section('content')
    <h1>Income Records</h1>
    <a href="{{ route('incomes.create') }}">Add Income</a>
    <table>
        <thead>
            <tr>
                <th>Source</th>
                <th>Amount</th>
                <th>Date Received</th>
                <th>Payment Method</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incomes as $income)
                <tr>
                    <td>{{ $income->source }}</td>
                    <td>{{ $income->amount }}</td>
                    <td>{{ $income->date_received->format('Y-m-d') }}</td>
                    <td>{{ $income->payment_method }}</td>
                    <td>
                        <a href="{{ route('incomes.edit', $income->id) }}">Edit</a>
                        <form action="{{ route('incomes.destroy', $income->id) }}" method="POST" style="display:inline;">
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