@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <h1>Edit User</h1>
    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password">Password (leave blank to keep current)</label>
            <input type="password" name="password" id="password">
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="role_id">Role</label>
            <select name="role_id" id="role_id" required>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id', $user->roles->first()->id ?? '') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
            @error('role_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Update User</button>
    </form>
    <a href="{{ route('users.index') }}">Back to Users</a>
@endsection