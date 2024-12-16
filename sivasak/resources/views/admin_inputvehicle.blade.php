<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Kendaraan</title>
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
            <li><img src="{{asset("file.png")}}" alt=""><a href="/admin_questionaire">Questioner</a></li>
            <li><img src="{{asset("bat.png")}}" alt=""><a href="/admin_vendor_list">Data Calon Vendor</a></li>
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

<!-- Daftar kendaraan -->
<div class="content">
    <h2>{{ isset($vehicle) ? 'Edit' : 'Tambah' }} Data Kendaraan</h2>
    <div class="form-container">
        <form action="{{ isset($vehicle) ? route('admin_editinputvehicle', ['vehicle_id' => $vehicle->vehicle_id]) : route('admin_storevehicle') }}" method="POST">
            @csrf
            @if (isset($vehicle))
                @method('PUT')
            @endif
            <tr>
                <th>Nomor Polisi</th>
                <td><input type="text" name="vehicle_plate" value="{{ $vehicle->vehicle_plate ?? '' }}" required {{ isset($vehicle) ? 'readonly' : '' }}></td>
            </tr>
            <tr>
                <th>Tahun Pembuatan</th>
                <td><input type="text" name="year" value="{{ $vehicle->year ?? '' }}" required></td>
            </tr>
            <tr>
                <th>Jenis Kendaraan</th>
                <td><input type="text" name="vehicle_type" value="{{ $vehicle->vehicle_type ?? '' }}" required></td>
            </tr>
            <tr>
                <th>No. STNK</th>
                <td><input type="text" name="vehicle_registration" value="{{ $vehicle->vehicle_registration ?? '' }}" required {{ isset($vehicle) ? 'readonly' : '' }}></td>
            </tr>
            <tr>
                <th>Masa Berlaku STNK</th>
                <td>
                    <input type="date" name="registration_expired" id="registration_expired" 
                           value="{{ $vehicle->registration_expired ?? '' }}" required>
                </td>
            </tr>
            <tr>
                <th>Masa Berlaku Pajak</th>
                <td>
                    <input type="date" name="vehicle_tax" id="vehicle_tax" 
                           value="{{ $vehicle->vehicle_tax ?? '' }}" required>
                </td>
            </tr>
            <tr>
                <th>Masa Berlaku Keur Kepala</th>
                <td>
                    <input type="date" name="head_cover_date" id="head_cover_date" 
                           value="{{ $vehicle->head_cover_date ?? '' }}" required>
                </td>
            </tr>
            <tr>
                <th>Masa Berlaku Keur Ekor</th>
                <td>
                    <input type="date" name="tail_cover_date" id="tail_cover_date" 
                           value="{{ $vehicle->tail_cover_date ?? '' }}" required>
                </td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td><textarea name="note" required>{{ $vehicle->note ?? '' }}</textarea></td>
            </tr>
            <div class="form-buttons">
                <button type="submit" class="submit-button">Simpan</button>
                <button type="button" class="cancel-button" onclick="window.history.back()">Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Fungsi untuk mendapatkan tanggal hari ini dalam format YYYY-MM-DD
    function getTodayDate() {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0'); // Bulan di JavaScript dimulai dari 0
        const day = String(today.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    // Terapkan atribut min ke semua input bertipe date
    document.addEventListener("DOMContentLoaded", () => {
        const today = getTodayDate();
        // Tetapkan batas minimal untuk semua input tipe date
        document.querySelectorAll('input[type="date"]').forEach(input => {
            input.setAttribute('min', today);
        });
    });
</script>

</body>
</html>
