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

<!-- Informasi Vendor -->
<div class="content">
    <div class="vendor-info">
        <h2>Informasi Vendor</h2>
        <div class="info-container">
            <table>
            <tr>
                <td>Nama Vendor</td>
                <td>: {{ $user->name }}</td> <!-- Pastikan ini tidak ada kesalahan penulisan -->
            </tr>
            <tr>
                <td>No. Telepon</td>
                <td>: {{ $user->phone_number }}</td> <!-- Periksa kesalahan sintaksis atau tanda kurung -->
            </tr>
            <tr>
                <td>Email</td>
                <td>: {{ $user->email }}</td>
            </tr>
            <tr>
                <td>Tipe Perusahaan</td>
                <td>: {{ $vendor ? $vendor->business_type : 'Tidak tersedia' }}</td>
            </tr>
            <tr>
                <td>NPWP</td>
                <td>: {{ $vendor ? $vendor->NPWP : 'Tidak tersedia' }}</td>
            </tr>
            <tr>
                <td>Alamat Perusahaan</td>
                <td>: {{ $vendor ? $vendor->address : 'Tidak tersedia' }}</td>
            </tr>
            </table>
        </div>
    </div>
</div>

</body>
</html>
