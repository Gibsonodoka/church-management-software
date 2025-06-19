@extends('layouts.app')

@section('title', 'Add Attendance')

@section('content')
    <h1>Add Attendance</h1>
    <form method="POST" action="{{ route('attendances.store') }}">
        @csrf
        <div>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="{{ old('date') }}" required>
            @error('date')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="month">Month</label>
            <input type="text" name="month" id="month" value="{{ old('month') }}" required>
            @error('month')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="service_description">Service Description</label>
            <input type="text" name="service_description" id="service_description" value="{{ old('service_description') }}" required>
            @error('service_description')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="men">Men</label>
            <input type="number" name="men" id="men" value="{{ old('men', 0) }}" min="0" required>
            @error('men')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="women">Women</label>
            <input type="number" name="women" id="women" value="{{ old('women', 0) }}" min="0" required>
            @error('women')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="youth">Youth</label>
            <input type="number" name="youth" id="youth" value="{{ old('youth', 0) }}" min="0" required>
            @error('youth')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="teens">Teens</label>
            <input type="number" name="teens" id="teens" value="{{ old('teens', 0) }}" min="0" required>
            @error('teens')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="children">Children</label>
            <input type="number" name="children" id="children" value="{{ old('children', 0) }}" min="0" required>
            @error('children')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="total">Total</label>
            <input type="number" name="total" id="total" value="{{ old('total', 0) }}" min="0" required>
            @error('total')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Add Attendance</button>
    </form>
    <a href="{{ route('attendances.index') }}">Back to Attendance</a>
@endsection