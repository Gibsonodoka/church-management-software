@extends('layouts.app')

@section('title', 'Add Income')

@section('content')
    <h1>Add Income</h1>
    <form method="POST" action="{{ route('incomes.store') }}">
        @csrf
        <div>
            <label for="source">Source</label>
            <input type="text" name="source" id="source" value="{{ old('source') }}" required>
            @error('source')
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
            <label for="date_received">Date Received</label>
            <input type="date" name="date_received" id="date_received" value="{{ old('date_received') }}" required>
            @error('date_received')
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
            <label for="donor">Donor</label>
            <input type="text" name="donor" id="donor" value="{{ old('donor') }}">
            @error('donor')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Add Income</button>
    </form>
    <a href="{{ route('incomes.index') }}">Back to Income</a>
@endsection