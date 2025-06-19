@extends('layouts.app')

@section('title', 'Add Department')

@section('content')
    <h1>Add Department</h1>
    <form method="POST" action="{{ route('departments.store') }}">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Add Department</button>
    </form>
    <a href="{{ route('departments.index') }}">Back to Departments</a>
@endsection