<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Tawaran</title>
    <link rel="stylesheet" href="styledash.css">
</head>
<body>

<!-- Sidebar -->
<header>
    <div class="sidebar">
        <ul>
            <h2>SIVASAK</h2>
            <li><img src="home.png" alt=""><a href="/admin_dashboard">Dashboard</a></li>
            <li><img src="pb.png" alt=""><a href="/admin_showoffering">Buat Tawaran</a></li>
            <li><img src="cb.png" alt=""><a href="/admin_vendorselection">Seleksi Vendor</a></li>
            <li><img src="sh.png" alt=""><a href="/admin_negotiate">Negoisasi</a></li>
            <li><img src="undo.png" alt=""><a href="/admin_tendercontrol">Kontrol Tender</a></li>
            <li><img src="file.png" alt=""><a href="daftarquestioner.php">Questioner</a></li>
            <li><img src="bat.png" alt=""><a href="/admin_maketender">Buat Akun Vendor</a></li>
            <li><img src="bat.png" alt=""><a href="datacalonvendor.php">Data Calon Vendor</a></li>
            <li><img src="as.png" alt=""><a href="/admin_makedriver">Buat Akun Supir</a></li>
            <li><img src="file.png" alt=""><a href="/admin_vehicles">Data Kendaraan</a></li>
            <li><img src="alert.png" alt=""><a href="/admin_complainlist">Daftar Komplain</a></li>
        </ul>
    </div>
</header>

<!-- Navbar -->
<div class="navbar">
    <div class="menu">
        <ul>
            <li><a href="#">Admin</a><img src="bp.png" alt=""></li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>

<div class="content">
    <h2>Buat Tawaran</h2>
    <form action="{{route("admin_storeoffering")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="item_name">Judul Tawaran</label>
        <input type="text" id="item_name" name="item_name" required>

        <label for="item_type">Jenis Barang</label>
        <input type="text" id="item_type" name="item_type" required>

        <label for="item_desc">Deskripsi</label>
        <textarea id="item_desc" name="item_desc" rows="4" required></textarea>

        <label for="item_price">Harga Total (Rp)</label>
        <input type="number" id="item_price" name="item_price" required>

        <label for="expired_date">Masa Berlaku</label>
        <input type="date" id="expired_date" name="expired_date" required>

        <label for="attachment">Lampiran</label>
        <input type="file" id="attachment" name="attachment">

        <button type="submit">Ajukan Tawaran</button>
    </form>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</div>

</body>
</html>