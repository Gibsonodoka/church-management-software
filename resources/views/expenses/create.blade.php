@extends('layouts.app')

@section('title', 'Add Expense')

@section('content')
    <h1>Add Expense</h1>
    <form method="POST" action="{{ route('expenses.store') }}">
        @csrf
        <div>
            <label for="category">Category</label>
            <input type="text" name="category" id="category" value="{{ old('category') }}" required>
            @error('category')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" value="{{ old('amount') }}" step="0.01" required>
            @error('amount')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="date_paid">Date Paid</label>
            <input type="date" name="date_paid" id="date_paid" value="{{ old('date_paid') }}" required>
            @error('date_paid')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="payment_method">Payment Method</label>
            <input type="text" name="payment_method" id="payment_method" value="{{ old('payment_method') }}" required>
            @error('payment_method')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
            @error('description')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Add Expense</button>
    </form>
    <a href="{{ route('expenses.index') }}">Back to Expenses</a>
@endsection