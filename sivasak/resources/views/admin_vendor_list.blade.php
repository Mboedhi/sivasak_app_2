<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Calon Vendor</title>
    <link rel="stylesheet" href="/styledash.css">
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
    <h2>Data Calon Vendor</h2>
    <div class="search-container">
        <input type="text" placeholder="Cari Vendor">
        <button class="search-button">Cari</button>
    </div>
    
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nomor Rekanan</th>
                    <th>Nama Perusahaan</th>
                    <th>NIB Perusahaan</th>
                    <th>Alamat Kantor</th>
                    <th>No. NPWP</th>
                    <th>Alamat NPWP</th>
                    <th>Bidang Usaha</th>
                    <th>Pimpinan/Direktur Utama</th>
                    <th>Personil Penghubung</th>
                    <th>Barang/Jasa yang dipasok</th>
                    <th>Alamat Pembayaran</th>
                    <th>Nama Bank</th>
                    <th>No. Rekening</th>
                    <th>Cabang</th>
                    <th>Atas Nama</th>
                    <!-- <th>Aksi</th> -->
                </tr>
            </thead>
                <tbody>
                    @forelse($vendors as $vendor)
                    <tr>
                        <td>{{ $vendor->rekanan }}</td>
                        <td>{{ $vendor->company_name }}</td>
                        <td>{{ $vendor->NIB }}</td>
                        <td>{{ $vendor->address }}</td>
                        <td>{{ $vendor->NPWP }}</td>
                        <td>{{ $vendor->NPWP_address }}</td>
                        <td>{{ $vendor->business_type }}</td>
                        <td>{{ $vendor->leader_name }}</td>
                        <td>{{ $vendor->contact_person }}</td>
                        <td>{{ $vendor->item_type }}</td>
                        <td>{{ $vendor->payment_address }}</td>
                        <td>{{ $vendor->bank }}</td>
                        <td>{{ $vendor->acc_num }}</td>
                        <td>{{ $vendor->behalf }}</td>
                        <td>{{ $vendor->status }}</td>
                      <!--  <td>
                            <button class="delete-button" onclick="openDeleteModal()">Hapus</button>
                             <button class="cek-button" onclick="window.location.href='detaildatacalonvendor.php' ">Cek</button> 
                        </td> -->
                    </tr>
                    @empty
                    <tr>
                        <td colspan="16" class="text_center">Tidak ada data vendor</td>
                    </tr>
                    @endforelse
                </tbody>
        </table>
    </div> 
</div>

    <script>
        function openModal() {
            document.getElementById('modal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }

        function openDeleteModal() {
            document.getElementById('delete-modal').style.display = 'flex';
        }

        function closeDeleteModal() {
            document.getElementById('delete-modal').style.display = 'none';
        }

        function deleteVendor() {
            alert("Data vendor dihapus");
            closeDeleteModal();
        }
    </script>
</body>
</html>
