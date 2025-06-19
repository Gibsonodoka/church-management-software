@extends('layouts.app')

@section('title', 'Edit Visitor')

@section('content')
    <h1>Edit Visitor</h1>
    <form method="POST" action="{{ route('visitors.update', $visitor->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname" value="{{ old('firstname', $visitor->firstname) }}" required>
            @error('firstname')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname" value="{{ old('lastname', $visitor->lastname) }}" required>
            @error('lastname')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $visitor->email) }}">
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $visitor->phone) }}" required>
            @error('phone')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" id="dob" value="{{ old('dob', $visitor->dob ? $visitor->dob->format('Y-m-d') : '') }}">
            @error('dob')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="gender">Gender</label>
            <select name="gender" id="gender" required>
                <option value="male" {{ old('gender', $visitor->gender) == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $visitor->gender) == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender', $visitor->gender) == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('gender')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" value="{{ old('address', $visitor->address) }}">
            @error('address')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label><input type="checkbox" name="want_to_be_member" value="1" {{ old('want_to_be_member', $visitor->want_to_be_member) ? 'checked' : '' }}> Wants to be Member</label>
            @error('want_to_be_member')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label><input type="checkbox" name="would_like_visit" value="1" {{ old('would_like_visit', $visitor->would_like_visit) ? 'checked' : '' }}> Would like Visit</label>
            @error('would_like_visit')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Update Visitor</button>
    </form>
    <a href="{{ route('visitors.index') }}">Back to Visitors</a>
@endsection