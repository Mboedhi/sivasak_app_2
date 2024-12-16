<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Akun Supir</title>
    <link rel="stylesheet" href="{{ asset('styledash.css') }}">
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


<!-- Edit Tawaran -->
<div class="content">
<h2>Edit Tawaran</h2>
<form action="{{ route('admin_updateoffering', ['item_id' => $item->item_id]) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Input fields -->

    <label for="item_desc">Deskripsi Item</label>
    <input type="text" name="item_desc" id="item_desc" value="{{ old('item_desc', $item->item_desc) }}">
    <br><br>


    <label for="expired_date">Tanggal Expired</label>
    <input type="date" name="expired_date" id="expired_date" value="{{ old('expired_date', $item->expired_date) }}">
    <br><br>

    <!-- Tombol Simpan dan Batal-->
     <div class="form-buttons">
        <button type="submit" class="submit-button">Simpan</button>
        <button type="button" class="cancel-button" onclick="window.history.back()">Batal</button>
     </div>
</form>
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
