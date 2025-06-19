@extends('layouts.app')

@section('title', 'Add User')

@section('content')
    <h1>Add User</h1>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="role_id">Role</label>
            <select name="role_id" id="role_id" required>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
            @error('role_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Add User</button>
    </form>
    <a href="{{ route('users.index') }}">Back to Users</a>
@endsection