<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/log.css') }}">
</head>

<body>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf
        <h2>Login</h2>
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>
        
        <button type="submit">Login</button>
        <p>Don't have an account? <a href="/register">Sign up here</a></p>
    </form>
</body>

</html>