<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleksi Vendor</title>
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
            <li><img src="{{asset("bat.png")}}" alt=""><a href="/admin_maketender">Buat Akun Vendor</a></li>
            <li><img src="{{asset("bat.png")}}"alt=""><a href="/admin_vendor_list">Data Calon Vendor</a></li>
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

<!-- Daftar Vendor -->
<div class="content">
    <h2>Seleksi Vendor</h2>
    
    <!-- Search Bar -->
    <div class="search-container">
        <input type="text" placeholder="Cari Vendor">
        <button class="search-button">Cari</button>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nama Perusahaan</th>
                    <th>NIB Perusahaan</th>
                    <th>Judul Tawaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendors as $vendor)
                <tr>
                    <td>{{ $vendor->company_name }}</td>
                    <td>{{ $vendor->NIB }}</td>
                    <td>test</td>
                    <td>
                        <button class="cek-button" onclick="acceptVendor({{$vendor->vendor_id}})">Terima Tawaran</button>
                        <button class="delete-button" onclick="rejectVendor({{$vendor->vendor_id}})">Tolak Tawaran</button>
                    </td>
                </tr>
                @endforeach
                <!-- Tambahkan baris data vendor lainnya -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Pop-up untuk Cek Vendor -->
<div class="modal" id="modal">
    <div class="modal-content">
        <h3>Detail Vendor</h3>
        <p>Nama Perusahaan : Vendor A</p><br>
        <p>NIB Perusahaan : 08123456789</p><br>
        <p>Alamat: Jl. Manggis Raya</p><br>
        <p>Email : Vendor_A@gmail.com</p>
        <div class="modal-buttons">
            <button class="close-button" onclick="closeModal()">Tutup</button>
        </div>
    </div>
</div>

<!-- Modal Pop-up untuk Hapus Vendor -->
<div class="delete-modal" id="delete-modal">
    <div class="delete-modal-content">
        <p>Hapus data vendor?</p>
        <div class="delete-modal-buttons">
            <button class="confirm-button" onclick="deleteVendor()">Hapus</button>
            <button class="cancel-button" onclick="closeDeleteModal()">Batal</button>
        </div>
    </div>
</div>

<script>
    function acceptVendor(vendor_id) {
        fetch(`/admin_vendorselection/accept/${vendor_id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(response => response.json())
        .then(data => {
            alert(data.message);
            location.reload(); // Reload halaman setelah berhasil
        }).catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menerima tawaran.');
        });
    }

    function rejectVendor(vendor_id) {
        fetch(`/admin_vendorselection/reject/${vendor_id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(response => response.json())
        .then(data => {
            alert(data.message);
            location.reload(); // Reload halaman setelah berhasil
        }).catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menolak tawaran.');
        });
    }


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