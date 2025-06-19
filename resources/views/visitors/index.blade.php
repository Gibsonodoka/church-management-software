@extends('layouts.app')

@section('title', 'Visitors')

@section('content')
    <h1>Visitors</h1>

    <a href="{{ route('visitors.admin.create') }}">Add Visitor</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($visitors as $visitor)
                <tr>
                    <td>{{ $visitor->firstname }} {{ $visitor->lastname }}</td>
                    <td>{{ $visitor->email }}</td>
                    <td>{{ $visitor->phone }}</td>
                    <td>
                        <a href="{{ route('visitors.admin.edit', $visitor->id) }}">Edit</a>

                        <form action="{{ route('visitors.admin.destroy', $visitor->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Are you sure you want to delete this visitor?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No visitors found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
