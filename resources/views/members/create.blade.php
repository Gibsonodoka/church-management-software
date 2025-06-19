@extends('layouts.app')

@section('title', 'Add Member')

@section('content')
    <h1>Add Member</h1>
    <form method="POST" action="{{ route('members.store') }}">
        @csrf
        <div>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
            @error('first_name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
            @error('last_name')
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
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required>
            @error('phone')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="gender">Gender</label>
            <select name="gender" id="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            @error('gender')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" id="dob" value="{{ old('dob') }}" required>
            @error('dob')
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
            <label for="marital_status">Marital Status</label>
            <input type="text" name="marital_status" id="marital_status" value="{{ old('marital_status') }}">
            @error('marital_status')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="baptized">Baptized</label>
            <select name="baptized" id="baptized" required>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            @error('baptized')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="membership_class">Membership Class</label>
            <select name="membership_class" id="membership_class" required>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            @error('membership_class')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="house_fellowship">House Fellowship</label>
            <select name="house_fellowship" id="house_fellowship" required>
                <option value="Rumibekwe">Rumibekwe</option>
                <option value="Woji">Woji</option>
                <option value="Rumudara">Rumudara</option>
                <option value="None">None</option>
            </select>
            @error('house_fellowship')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="organization_belonged_to">Organization</label>
            <select name="organization_belonged_to" id="organization_belonged_to">
                <option value="">None</option>
                <option value="Men">Men</option>
                <option value="Women">Women</option>
                <option value="Youth">Youth</option>
                <option value="Teens">Teens</option>
                <option value="Children">Children</option>
            </select>
            @error('organization_belonged_to')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label>Current Team</label>
            @foreach (['Drama', 'Media', 'Technical', 'Visitation', 'Leadership', 'Pastoral', 'Sunday school', 'None'] as $team)
                <label><input type="checkbox" name="current_team[]" value="{{ $team }}"> {{ $team }}</label>
            @endforeach
            @error('current_team')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Add Member</button>
    </form>
@endsection