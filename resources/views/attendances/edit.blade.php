@extends('layouts.app')

@section('title', 'Edit Attendance')

@section('content')
    <h1>Edit Attendance</h1>
    <form method="POST" action="{{ route('attendances.update', $attendance->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="{{ old('date', $attendance->date->format('Y-m-d')) }}" required>
            @error('date')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="month">Month</label>
            <input type="text" name="month" id="month" value="{{ old('month', $attendance->month) }}" required>
            @error('month')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="service_description">Service Description</label>
            <input type="text" name="service_description" id="service_description" value="{{ old('service_description', $attendance->service_description) }}" required>
            @error('service_description')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="men">Men</label>
            <input type="number" name="men" id="men" value="{{ old('men', $attendance->men) }}" min="0" required>
            @error('men')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="women">Women</label>
            <input type="number" name="women" id="women" value="{{ old('women', $attendance->women) }}" min="0" required>
            @error('women')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="youth">Youth</label>
            <input type="number" name="youth" id="youth" value="{{ old('youth', $attendance->youth) }}" min="0" required>
            @error('youth')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="teens">Teens</label>
            <input type="number" name="teens" id="teens" value="{{ old('teens', $attendance->teens) }}" min="0" required>
            @error('teens')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="children">Children</label>
            <input type="number" name="children" id="children" value="{{ old('children', $attendance->children) }}" min="0" required>
            @error('children')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="total">Total</label>
            <input type="number" name="total" id="total" value="{{ old('total', $attendance->total) }}" min="0" required>
            @error('total')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Update Attendance</button>
    </form>
    <a href="{{ route('attendances.index') }}">Back to Attendance</a>
@endsection