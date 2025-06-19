@extends('layouts.app')

@section('title', 'Expense Records')

@section('content')
    <h1>Expense Records</h1>
    <a href="{{ route('expenses.create') }}">Add Expense</a>
    <table>
        <thead>
            <tr>
                <th>Category</th>
                <th>Amount</th>
                <th>Date Paid</th>
                <th>Payment Method</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $expense)
                <tr>
                    <td>{{ $expense->category }}</td>
                    <td>{{ $expense->amount }}</td>
                    <td>{{ $expense->date_paid->format('Y-m-d') }}</td>
                    <td>{{ $expense->payment_method }}</td>
                    <td>
                        <a href="{{ route('expenses.edit', $expense->id) }}">Edit</a>
                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;">
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