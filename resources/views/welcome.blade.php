<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Welcome to Church Management System</h1>
        <p><a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a> to get started.</p>
    </div>
</body>
</html>