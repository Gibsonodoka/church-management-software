@extends('layouts.app')

@section('title', 'Add Visitor')

@section('content')
    <h1>Add Visitor</h1>
    <form method="POST" action="{{ route('visitors.admin.store') }}">
        @csrf
        <div>
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" required>
            @error('firstname')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" required>
            @error('lastname')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required>
            @error('phone')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" id="dob" value="{{ old('dob') }}">
            @error('dob')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="gender">Gender</label>
            <select name="gender" id="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            @error('gender')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" value="{{ old('address') }}">
            @error('address')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label><input type="checkbox" name="want_to_be_member" value="1" {{ old('want_to_be_member') ? 'checked' : '' }}> Wants to be Member</label>
            @error('want_to_be_member')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label><input type="checkbox" name="would_like_visit" value="1" {{ old('would_like_visit') ? 'checked' : '' }}> Would like Visit</label>
            @error('would_like_visit')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Add Visitor</button>
    </form>
@endsection