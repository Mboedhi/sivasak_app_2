<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Supir</title>
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

<!-- Daftar Akun Supir -->
<div class="content">
    <h2>Daftar Akun Supir</h2>
    
    <!-- Tombol Tambah Akun -->
    <div class="button-container">
        <button class="tambah-button" onclick="window.location.href='/admin_makedriveracc'">Tambah Akun</button>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nama Supir</th>
                    <th>No Telepon</th>
                    <th>Email</th>
                    <th>Jenis Kendaraan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($drivers as $driver)
                    <tr>
                        <td>{{$driver->name}}</td>
                        <td>{{$driver->phone_number}}</td>
                        <td>{{$driver->email}}</td>
                        <td>{{$driver->vehicle_type}}</td>
                        <td>
                            <button class="edit-button" onclick="window.location.href='{{ route('admin_editinputdriveracc', ['user_id' => $driver->user_id]) }}'">Edit</button>
                            <button class="cek-button" onclick="openModal('{{ $driver->user_id }}')">Cek</button>
                            <button class="delete-button" onclick="openDeleteModal({{ $driver->user_id }})">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada Data Akun Supir</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Pop-up untuk Cek Akun Supir -->
<div class="modal" id="modal">
    <div class="modal-content">
        <h3>Detail Akun Supir</h3>
        <div id="driver_details"></div>
        <div class="modal-buttons">
            <button class="close-button" onclick="closeModal()">Tutup</button>
        </div>
    </div>
</div>

<!-- Modal Pop-up untuk Hapus Akun Supir -->
<div class="delete-modal" id="delete-modal">
    <div class="delete-modal-content">
        <p>Hapus data supir?</p>
        <div class="delete-modal-buttons">
            <button class="confirm-button" onclick="confirmDeleteSupir()">Hapus</button>
            <button class="cancel-button" onclick="closeDeleteModal()">Batal</button>
        </div>
    </div>
</div>

<script>
    let currentDriverId;

        function openModal(user_id) {
            fetch(`/user/${user_id}/details`)
                .then(response => response.json())  
                .then(data => {
                    var driverDetails = `
                        <p>Nama Supir:${data.name} </p>
                        <p>No Telpon:${data.phone_number} </p>
                        <p>Email:${data.email} </p>
                        <p>Jenis Kendaraan:${data.vehicle_type} </p>
                    `;
                    document.getElementById('driver_details').innerHTML = driverDetails;

                    document.getElementById('modal').style.display = 'flex';
                })
                .catch(error => console.error('Error fetching user data:', error));
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }

        function openDeleteModal(driverId) {
            currentDriverId = driverId
            document.getElementById('delete-modal').style.display = 'flex';
        }

        function closeDeleteModal() {
            document.getElementById('delete-modal').style.display = 'none';
        }

        function confirmDeleteSupir() {
            fetch(`/user/${currentDriverId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',  // Diperlukan untuk Laravel CSRF protection
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.text().then(text => {
                        console.error('Error response:', text); // Debug error HTML jika ada
                        throw new Error(`HTTP Error: ${response.status}`);
                    });
                }
                return response.json(); // Parsing JSON jika respons valid
            })
            .then(data => {
                if (data.success) {
                    alert("Data supir berhasil dihapus");
                    location.reload(); // Reload halaman
                } else {
                    alert("Gagal menghapus data supir: " + (data.message || 'Tidak diketahui'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan dalam menghapus data: ' + error.message);
            })
            .finally(() => {
                closeDeleteModal();
            });
        }


</script>

</body>
</html>
