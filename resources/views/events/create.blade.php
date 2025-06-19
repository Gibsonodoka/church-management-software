@extends('layouts.app')

@section('title', 'Add Event')

@section('content')
    <h1>Add Event</h1>
    <form method="POST" action="{{ route('events.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            @error('title')
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
        <div>
            <label for="start">Start Date & Time</label>
            <input type="datetime-local" name="start" id="start" value="{{ old('start') }}" required>
            @error('start')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="end">End Date & Time</label>
            <input type="datetime-local" name="end" id="end" value="{{ old('end') }}" required>
            @error('end')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="location">Location</label>
            <input type="text" name="location" id="location" value="{{ old('location') }}">
            @error('location')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="organizer">Organizer</label>
            <input type="text" name="organizer" id="organizer" value="{{ old('organizer') }}">
            @error('organizer')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="type">Type</label>
            <input type="text" name="type" id="type" value="{{ old('type') }}">
            @error('type')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Add Event</button>
    </form>
    <a href="{{ route('events.index') }}">Back to Events</a>
@endsection