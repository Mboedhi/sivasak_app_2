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
        <li><img src="{{asset('pb.png')}}" alt=""><a href="/vendor_register">Pendaftaran Vendor</a></li>
        <li><img src="{{asset('file.png')}}" alt=""><a href="/vendor_questioner">Questioner</a></li>
        <li><img src="{{asset('sh.png')}}" alt=""><a href="/vendor_negotiate">Negosiasi</a></li>
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
    <!-- Isi -->
    <div class="content">
        <h2>Negosiasi Vendor</h2>
        <div class="negotiation-container">
            <form class="negotiation-form" action="{{ route('vendor_negotiate_detail.store') }}" method="POST">
                @csrf
                <input type="hidden" name="assessment_id" value="{{ $item_assessment->assessment_id }}">

                <label for="vendor-name">Nama Vendor</label>
                <input type="text" id="vendor-name" value="{{ $item_assessment->vendor->company_name }}" disabled>

                <label for="title">Judul</label>
                <input type="text" id="title" value="{{ $item_assessment->item->item_name }}" disabled>

                <label for="initial-price">Harga Awal</label>
                <div class="price-display">Rp.{{ number_format($item_assessment->item->item_price, 0, ',', '.') }}</div>

                <label for="offer-price">Harga yang ingin ditawarkan</label>
                <input type="number" id="offer-price" name="price_nego" placeholder="Harga Negosiasi (harga harus dibawah harga awal)" required>

                <button type="submit" class="submit-button">Ajukan Negosiasi</button>
            </form>
        </div>
        <button class="back-tombol" onclick="window.location.href='/vendor_negotiate'" style="margin-left: 291px; margin-top: 20px;">Kembali</button>
    </div>
</body>
</html>
