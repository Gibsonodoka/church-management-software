@extends('layouts.app')

@section('title', 'Edit Member')

@section('content')
    <h1>Edit Member</h1>
    <form method="POST" action="{{ route('members.update', $member->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $member->first_name) }}" required>
            @error('first_name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $member->last_name) }}" required>
            @error('last_name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $member->email) }}" required>
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $member->phone) }}" required>
            @error('phone')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="gender">Gender</label>
            <select name="gender" id="gender" required>
                <option value="male" {{ $member->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $member->gender == 'female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('gender')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" id="dob" value="{{ old('dob', $member->dob) }}" required>
            @error('dob')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" value="{{ old('address', $member->address) }}">
            @error('address')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="marital_status">Marital Status</label>
            <input type="text" name="marital_status" id="marital_status" value="{{ old('marital_status', $member->marital_status) }}">
            @error('marital_status')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="baptized">Baptized</label>
            <select name="baptized" id="baptized" required>
                <option value="Yes" {{ $member->baptized == 'Yes' ? 'selected' : '' }}>Yes</option>
                <option value="No" {{ $member->baptized == 'No' ? 'selected' : '' }}>No</option>
            </select>
            @error('baptized')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="membership_class">Membership Class</label>
            <select name="membership_class" id="membership_class" required>
                <option value="Yes" {{ $member->membership_class == 'Yes' ? 'selected' : '' }}>Yes</option>
                <option value="No" {{ $member->membership_class == 'No' ? 'selected' : '' }}>No</option>
            </select>
            @error('membership_class')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="house_fellowship">House Fellowship</label>
            <select name="house_fellowship" id="house_fellowship" required>
                <option value="Rumibekwe" {{ $member->house_fellowship == 'Rumibekwe' ? 'selected' : '' }}>Rumibekwe</option>
                <option value="Woji" {{ $member->house_fellowship == 'Woji' ? 'selected' : '' }}>Woji</option>
                <option value="Rumudara" {{ $member->house_fellowship == 'Rumudara' ? 'selected' : '' }}>Rumudara</option>
                <option value="None" {{ $member->house_fellowship == 'None' ? 'selected' : '' }}>None</option>
            </select>
            @error('house_fellowship')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="organization_belonged_to">Organization</label>
            <select name="organization_belonged_to" id="organization_belonged_to">
                <option value="" {{ !$member->organization_belonged_to ? 'selected' : '' }}>None</option>
                <option value="Men" {{ $member->organization_belonged_to == 'Men' ? 'selected' : '' }}>Men</option>
                <option value="Women" {{ $member->organization_belonged_to == 'Women' ? 'selected' : '' }}>Women</option>
                <option value="Youth" {{ $member->organization_belonged_to == 'Youth' ? 'selected' : '' }}>Youth</option>
                <option value="Teens" {{ $member->organization_belonged_to == 'Teens' ? 'selected' : '' }}>Teens</option>
                <option value="Children" {{ $member->organization_belonged_to == 'Children' ? 'selected' : '' }}>Children</option>
            </select>
            @error('organization_belonged_to')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label>Current Team</label>
            @php $currentTeams = json_decode($member->current_team, true) ?? []; @endphp
            @foreach (['Drama', 'Media', 'Technical', 'Visitation', 'Leadership', 'Pastoral', 'Sunday school', 'None'] as $team)
                <label><input type="checkbox" name="current_team[]" value="{{ $team }}" {{ in_array($team, $currentTeams) ? 'checked' : '' }}> {{ $team }}</label>
            @endforeach
            @error('current_team')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Update Member</button>
    </form>
@endsection