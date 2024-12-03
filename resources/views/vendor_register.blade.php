<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Vendor</title>
    <link rel="stylesheet" href="{{ asset('styledash.css') }}">
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <ul>
        <h2>SIVASAK</h2>
        <li><img src="{{asset('home.png')}}" alt=""><a href="/vendor_dashboard">Dashboard</a></li>
        <li><img src="{{asset('pb.png')}}" alt=""><a href="pendaftaran.php">Pendaftaran Vendor</a></li>
        <li><img src="{{asset('file.png')}}" alt=""><a href="questioner.php">Questioner</a></li>
        <li><img src="{{asset('sh.png')}}" alt=""><a href="negosiasivendor.php">Negosiasi</a></li>
        <li><img src="{{asset('pb.png')}}" alt=""><a href="/vendor_offer_list">Daftar Tawaran Perusahaan</a></li>
    </ul>
</div>

<!-- Navbar -->
<div class="navbar">
    <div class="menu">
        <ul>
            <li><a href="#">Vendor</a><img src="{{asset('bp.png')}}" alt=""></li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>

<!-- Main Content -->
<div class="content">
    <div class="form-container">
        <h2>Form Pendaftaran Vendor</h2>
        <form action="{{route('vendor_register_submit')}}" method="POST">
            @csrf

            <label for="nomor_rekanan">Nomor Rekanan</label>
            <input type="text" id="nomor_rekanan" name="nomor_rekanan" required>

            <label for="nama_perusahaan">Nama Perusahaan</label>
            <input type="text" id="nama_perusahaan" name="nama_perusahaan" required>

            <label for="nib_perusahaan">NIB Perusahaan</label>
            <input type="text" id="nib_perusahaan" name="nib_perusahaan" required>

            <label for="alamat_kantor">Alamat Kantor</label>
            <input type="text" id="alamat_kantor" name="alamat_kantor" required>

            <label for="no_npwp">No. NPWP</label>
            <input type="text" id="no_npwp" name="no_npwp" required>

            <label for="alamat_npwp">Alamat NPWP</label>
            <input type="text" id="alamat_npwp" name="alamat_npwp" required>

            <label for="bidang_usaha">Bidang Usaha</label>
            <input type="text" id="bidang_usaha" name="bidang_usaha" required>

            <label for="pimpinan">Pimpinan/Direktur Utama</label>
            <input type="text" id="pimpinan" name="pimpinan" required>

            <label for="personil_penghubung">Personil Penghubung</label>
            <input type="text" id="personil_penghubung" name="personil_penghubung" required>

            <label for="barang_jasa">Barang/Jasa yang Dipasok</label>
            <input type="text" id="barang_jasa" name="barang_jasa" required>

            <label for="alamat_pembayaran">Alamat Pembayaran</label>
            <input type="text" id="alamat_pembayaran" name="alamat_pembayaran" required>

            <label for="nama_bank">Nama Bank</label>
            <input type="text" id="nama_bank" name="nama_bank" required>

            <label for="no_rekening">No. Rekening</label>
            <input type="text" id="no_rekening" name="no_rekening" required>

            <label for="cabang">Cabang</label>
            <input type="text" id="cabang" name="cabang" required>

            <label for="atas_nama">Atas Nama</label>
            <input type="text" id="atas_nama" name="atas_nama" required>

            <button type="submit">Daftar</button>
        </form>
    </div>
    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
    @endif

</div>

</body>
</html>
