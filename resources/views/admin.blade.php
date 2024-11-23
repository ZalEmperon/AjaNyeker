<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah produk</title>
</head>

<body>
    <html>

    <head>
        <title>
            ECommerce Dashboard
        </title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap"
            rel="stylesheet" />
        <style>
            body {
                font-family: 'Roboto', sans-serif;
                background-color: #f5f5f5;
                margin: 0;
                padding: 0;
            }

            .sidebar {
                width: 250px;
                background-color: #ffffff;
                height: 100vh;
                position: fixed;
                box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            }

            .sidebar h2 {
                text-align: center;
                padding: 20px 0;
                color: #6c63ff;
            }

            .sidebar ul {
                list-style: none;
                padding: 0;
            }

            .sidebar ul li {
                padding: 15px 20px;
                color: #333;
                cursor: pointer;
            }

            .sidebar ul li:hover {
                background-color: #6c63ff;
                color: #fff;
            }

            .sidebar ul li i {
                margin-right: 10px;
            }

            .main-content {
                margin-left: 250px;
                padding: 20px;
            }

            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                background-color: #ffffff;
                padding: 10px 20px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            .header .user-info {
                display: flex;
                align-items: center;
            }

            .header .user-info img {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                margin-right: 10px;
            }

            .header .user-info span {
                font-weight: 500;
            }

            .header .user-info small {
                display: block;
                color: #888;
            }

            .cards {
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
            }

            .card {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                width: 23%;
                text-align: center;
            }

            .card h3 {
                margin: 10px 0;
                font-size: 18px;
                color: #333;
            }

            .card p {
                margin: 0;
                font-size: 24px;
                font-weight: 700;
            }

            .card i {
                font-size: 30px;
                margin-bottom: 10px;
            }

            .card:nth-child(1) i {
                color: #6c63ff;
            }

            .card:nth-child(2) i {
                color: #00bcd4;
            }

            .card:nth-child(3) i {
                color: #ff4081;
            }

            .card:nth-child(4) i {
                color: #ff9800;
            }

            .charts {
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
            }

            .chart {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                width: 48%;
            }

            .chart h3 {
                margin: 0 0 20px 0;
                font-size: 18px;
                color: #333;
            }
        </style>
    </head>

    <body>
        <div class="sidebar">
            <h2>
                AJA-NYEKER
            </h2>
            <ul>
                <li class="active">
                    <i class="fas fa-tachometer-alt">
                    </i>
                    Dashboard
                </li>
                <li>
                    <i class="fas fa-users">
                    </i>
                    Customers
                </li>
                <li>
                    <i class="fas fa-shopping-cart">
                    </i>
                    Orders
                </li>
                <li>
                    <i class="fas fa-box">
                    </i>
                    <a href="{{ route('adminproduct') }}">product</a>
                </li>
                <li>
                    <i class="fas fa-chart-line">
                    </i>
                    Sales
                </li>
                <li>
                    <i class="fas fa-chart-line">
                    </i>
                    <a href="{{ route('login') }}">logout</a>

                </li>
            </ul>
        </div>
        <div class="main-content">
            <div class="header">
                <div>
                </div>
                <div class="user-info">
                    <img alt="User profile picture" height="40" src="{{ asset(path: 'image/toko.jpg') }}" width="40" />
                    <div>
                        <span>
                            Welcome, {{ auth()->user()->username }}
                        </span>
                        <small>
                            Admin
                        </small>
                    </div>
                </div>
            </div>

            <h1>Admin Dashboard</h1>
            <h2>User Management</h2>

            @if (session('success'))
                <p style="color:green">{{ session('success') }}</p>
            @endif

            <table border="1" cellpadding="10">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Phone Number</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <form action="{{ route('admin.user.update', $user->id_user) }}" method="POST">
                                @csrf
                                <td>
                                    <input type="text" name="username" value="{{ $user->username }}" required>
                                </td>
                                <td>
                                    <input type="text" name="phone_number" value="{{ $user->phone_number }}" required>
                                </td>
                                <td>
                                    <select name="role" required>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="password" name="password" placeholder="New Password">
                                    <button type="submit">Update</button>
                                </td>
                            </form>
                            <td>
                                <form action="{{ route('admin.user.delete', $user->id_user) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>

    </html>
</body>

</html>