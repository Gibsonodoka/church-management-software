<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @if (auth()->user() && (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Senior Pastor')))
                    <li><a href="{{ route('members.index') }}">Members</a></li>
                    <li><a href="{{ route('visitors.index') }}">Visitors</a></li>
                    <li><a href="{{ route('attendances.index') }}">Attendance</a></li>
                    <li><a href="{{ route('events.index') }}">Events</a></li>
                    <li><a href="{{ route('departments.index') }}">Departments</a></li>                    <li><a href="{{ route('incomes.index') }}">Income</a></li>
                    <li><a href="{{ route('expenses.index') }}">Expenses</a></li>
                    <li><a href="{{ route('users.index') }}">Users</a></li>
                @endif
                @if (auth()->user())
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif
            </ul>
        </nav>
        @if (session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert error">{{ session('error') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>