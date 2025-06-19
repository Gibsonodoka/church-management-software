@extends('layouts.app')

@section('title', 'Edit Department')

@section('content')
    <h1>Edit Department</h1>
    <form method="POST" action="{{ route('departments.update', $department->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $department->name) }}" required>
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Update Department</button>
    </form>
    <a href="{{ route('departments.admin.index') }}">Back to Departments</a>
@endsection