<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/log.css') }}">
</head>
<body>
    <form action="/register" method="POST">
        @csrf
        <h2>Register</h2>
        <label>Username</label>
        <input type="text" name="username" required>
        
        <label>Phone Number</label>
        <input type="text" name="phone_number" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit">Register</button>
        <p>Already have an account? <a href="/login">Login here</a></p>
    </form>
</body>
</html>
