<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Supir</title>
    <link rel="stylesheet" href="{{ asset('styledash.css') }}">
    <style>
    input[readonly] {
        background-color: #f0f0f0; 
        cursor: not-allowed; 
        color: #666; 
        border: 1px solid #ccc; 
    }

    </style>
</head>

<header>
    <div class="sidebar">
        <ul>
            <h2>SIVASAK</h2>
            <li><img src="{{asset('home.png')}}" alt=""><a href="/admin_dashboard">Dashboard</a></li>
            <li><img src="{{asset("pb.png")}}" alt=""><a href="/admin_showoffering">Buat Tawaran</a></li>
            <li><img src="{{asset("cb.png")}}" alt=""><a href="/admin_vendorselection">Seleksi Vendor</a></li>
            <li><img src="{{asset("sh.png")}}" alt=""><a href="/admin_negotiate">Negosiasi</a></li>
            <li><img src="{{asset("undo.png")}}" alt=""><a href="/admin_tendercontrol">Kontrol Tender</a></li>
            <li><img src="{{asset("file.png")}}" alt=""><a href="daftarquestioner.php">Questioner</a></li>
            <li><img src="{{asset("bat.png")}}" alt=""><a href="/admin_maketender">Buat Akun Vendor</a></li>
            <li><img src="{{asset("bat.png")}}"alt=""><a href="datacalonvendor.php">Data Calon Vendor</a></li>
            <li><img src="{{asset("as.png")}}" alt=""><a href="/admin_makedriver">Buat Akun Supir</a></li>
            <li><img src="{{asset("file.png")}}" alt=""><a href="/admin_vehicles">Data Kendaraan</a></li>
            <li><img src="{{asset("alert.png")}}" alt=""><a href="/admin_complainlist">Daftar Komplain</a></li>
        </ul>
    </div>
</header>

<body>
<!-- Navbar -->
<div class="navbar">
    <div class="menu">
        <ul>
            <li><a href="#">Admin</a><img src="{{asset('bp.png')}}" alt=""></li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>

    <!-- Daftar Akun Tender -->
    <div class="content">
        <h2>{{ isset($driver) ? 'Edit' : 'Tambah' }} Akun Supir</h2>
        <div class="form-container">
        <form action="{{ isset($driver) ? route('admin_editinputdriveracc', $driver->user_id) : route('driver_register') }}" method="POST">
                @csrf
                @if (isset($driver))
                    @method('PUT')            
                @endif
                    <tr>
                        <th>Nama Supir</th>
                        <td><input type="text" value="{{$driver->name ?? ''}}" id="name" name="name"></td>
                    </tr>
                    <tr>
                        <th>No. Telpon</th>
                        <td><input type="text" value="{{$driver->phone_number ?? ''}}" id="phone_number" name="phone_number"></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><input type="email" value="{{$driver->email ?? ''}}" id="email" name="email" {{ isset($driver) ? 'readonly' : '' }}></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input type="password" value="{{$driver->password ?? ''}}" id="password" name="password" {{ isset($driver) ? 'readonly' : '' }}></td>
                    </tr>

                    <label for="vehicle_type">Jenis Kendaraan</label>
                    <select name="vehicle_type" value="{{$driver->vehicle_type ?? ''}}" id="vehicle_type" required>
                        <option value="">Pilih pengalaman</option>
                        <option value="Trailer">Trailer</option>
                        <option value="Tronton">Tronton</option>
                        <option value="Dumptruck">Dumptruck</option>
                        <option value="Highblow">Highblow</option>
                        <option value="Wingbox">Wingbox</option>
                    </select>
                    <div class="form-buttons">
                        <button type="submit" class="submit-button">Simpan</button>
                        <button type="button" class="cancel-button" onclick="window.history.back()">Batal</button>
                    </div>
                </form>

                @if (session('success'))
                    <div class="popup success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

        </div>
    </div>
</body>
</html>
