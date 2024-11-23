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
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
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

            .sidebar ul li:hover,
            .sidebar ul li.active {
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

            .container {
                width: 60%;
                margin: 0 auto;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin-top: 50px;
            }

            h2 {
                text-align: center;
                color: #6c63ff;
                margin-bottom: 20px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-group label {
                display: block;
                font-weight: 500;
                color: #333;
                margin-bottom: 8px;
            }

            .form-group input,
            .form-group textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 5px;
                font-size: 16px;
            }

            .form-group input:focus,
            .form-group textarea:focus {
                border-color: #6c63ff;
                outline: none;
                box-shadow: 0 0 5px rgba(108, 99, 255, 0.5);
            }

            textarea {
                resize: vertical;
            }

            .btn {
                background-color: #6c63ff;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                display: block;
                width: 100%;
                text-align: center;
            }

            .btn:hover {
                background-color: #574bdb;
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
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt">
                        </i>Dashboard
                </li></a>
                <li>
                    <i class="fas fa-users">Customers</i>
                </li>
                <li>
                    <i class="fas fa-shopping-cart">
                    </i>
                    Orders
                </li>
                <li>
                    <i class="fas fa-box">
                    </i>
                    Products
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

            <div class="navbar">
                <ul style="display: flex; list-style: none; padding: 10px; background-color: #f5f5f5;">
                    <li style="margin-right: 20px;">
                        <a href="{{ route('produk.tambah') }}" style="text-decoration: none; color: #6c63ff;">Tambah
                            Produk</a>
                    </li>
                    <li style="margin-right: 20px;">
                        <a href="{{ route('produk.hapus') }}" style="text-decoration: none; color: #6c63ff;">Hapus
                            Produk</a>
                    </li>
                    <li>
                        <a href="{{ route('produk.edit') }}" style="text-decoration: none; color: #6c63ff;">Edit
                            Produk</a>
                    </li>
                </ul>
            </div>

            <div class="container">
                <h2>Tambah Produk Sepatu</h2>
                <form action="/produk/tambah" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_sepatu">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_sepatu" id="nama_sepatu" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="merek_sepatu">Nama Brand</label>
                        <input type="text" class="form-control" name="merek_sepatu" id="merek_sepatu" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="jk_sepatu">Jenis Kelamin</label>
                        <input type="text" class="form-control" name="jk_sepatu" id="jk_sepatu" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="varian_sepatu">Varian Warna</label>
                        <button type="button" class="btn btn-primary" onclick="addInputVarian()">Tambah</button>
                        <div id="input-group-varian">
                            {{-- <div class="input-group">
                                <input type="color" name="warna_sepatu" id="warna_sepatu" class="form-control" value="" required>
                                <input type="text" name="desk_sepatu" id="desk_sepatu" class="form-control" value="" required>
                            </div> --}}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="ukuran_sepatu">Ukuran (Angka)</label>
                        <button type="button" class="btn btn-primary" onclick="addInputUkuran()">Tambah</button>
                        <div id="input-group-ukuran">
                            {{-- <div class="input-group">
                                <input type="text" name="ukuran_sepatu" id="ukuran_sepatu" class="form-control" value="" required>
                            </div> --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga_sepatu">Harga</label>
                        <input type="number" class="form-control" name="harga_sepatu" id="harga_sepatu" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori_sepatu">kategori</label>
                        <input type="text" class="form-control" name="kategori_sepatu" id="kategori_sepatu" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar_sepatu">Upload Gambar</label>
                        <input type="file" name="gambar_sepatu" accept="image/*" id="gambar_sepatu">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_sepatu">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi_sepatu" rows="3"
                            id="deskripsi_sepatu" value=""></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah Produk</button>
                </form>
            </div>

        </div>
        <script>
            let inputCount = 0;
            function addInputVarian() {
                var inputGroup = document.createElement("div");
                inputGroup.className = "input-group";
                inputGroup.id = "input-varian-" + inputCount;

                var colorInput = document.createElement("input");
                colorInput.type = "color";
                colorInput.name = "warna_sepatu[]";
                colorInput.className = "form-control";
                colorInput.id = "warna_sepatu" + inputCount; 
                colorInput.required = true;

                var descriptionInput = document.createElement("input");
                descriptionInput.type = "text";
                descriptionInput.name = "desk_sepatu[]";
                descriptionInput.className = "form-control";
                descriptionInput.id = "desk_sepatu" + inputCount; 
                descriptionInput.required = true;

                var deleteButton = document.createElement("button");
                deleteButton.className = "btn btn-danger";
                deleteButton.textContent = " X ";
                deleteButton.onclick = function() {
                    removeInputGroup(inputGroup.id); 
                };

                inputGroup.appendChild(colorInput);
                inputGroup.appendChild(descriptionInput);
                inputGroup.appendChild(deleteButton);

                document.getElementById("input-group-varian").appendChild(inputGroup);
            }

            function addInputUkuran() {
                inputCount++;

                var inputGroup = document.createElement("div");
                inputGroup.className = "input-group";
                inputGroup.id = "input-ukuran-" + inputCount;

                var ukuranInput = document.createElement("input");
                ukuranInput.type = "text";
                ukuranInput.name = "ukuran_sepatu[]"; 
                ukuranInput.className = "form-control";
                ukuranInput.id = "ukuran_sepatu" + inputCount; 
                ukuranInput.required = true;

                var deleteButton = document.createElement("button");
                deleteButton.className = "btn btn-danger";
                deleteButton.textContent = " X ";
                deleteButton.onclick = function() {
                    removeInputGroup(inputGroup.id); 
                };

                inputGroup.appendChild(ukuranInput);
                inputGroup.appendChild(deleteButton);

                document.getElementById("input-group-ukuran").appendChild(inputGroup);
            }

            function removeInputGroup(id) {
                var inputGroup = document.getElementById(id);
                inputGroup.remove(); 
                inputCount--;
            }
        </script>
    </body>

    </html>
</body>

</html>