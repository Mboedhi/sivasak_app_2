<!DOCTYPE html>
<html>
<head>
    <title>Data Kendaraan</title>
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

    <!-- Daftar Kendaraan -->
<div class="content">
    <h2>Data Kendaraan</h2>
    
    <div class="search-container">
        <input type="text" placeholder="Cari Nopol Kendaraan">
        <button class="search-button">Cari</button>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nomor Polisi</th>
                    <th>Tahun Pembuatan</th>
                    <th>Jenis Kendaraan</th>
                    <th>No.STNK</th>
                    <th>Masa Berlaku STNK</th>
                    <th>Masa Berlaku Pajak</th>
                    <th>Masa Berlaku Keur Kepala</th>
                    <th>Masa Berlaku Keur Ekor</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->vehicle_plate }}</td>
                    <td>{{ $vehicle->year }}</td>
                    <td>{{ $vehicle->vehicle_type }}</td>
                    <td>{{ $vehicle->vehicle_registration }}</td>
                    <td>{{ $vehicle->registration_expired}}</td>
                    <td>{{ $vehicle->vehicle_tax}}</td>
                    <td>{{ $vehicle->head_cover_date}}</td>
                    <td>{{ $vehicle->tail_cover_date}}</td>
                    <td>{{ $vehicle->note}}</td>
                    <td>
                        <button class="edit-button" onclick="window.location.href='{{ route('admin_editinputvehicle', ['vehicle_id' => $vehicle->vehicle_id]) }}'">Edit</button>
                        <button class="delete-button" onclick="openDeleteModal({{ $vehicle->vehicle_id }})">Hapus</button>
                        <button class="cek-button" onclick="openModal({{ $vehicle->vehicle_id }})">Cek</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text_center">Tidak ada data kendaraan.</td>
                </tr>
                @endforelse
        </tbody>
        </table>
    </div>

    <!-- Tombol Tambah Data Kendaraan -->
    <div class="button-container">
        <button class="tambah-button" onclick="window.location.href='/admin_inputvehicle'">Tambah Data</button>
    </div>
</div>

<!-- Modal Pop-up untuk Cek Akun tender -->
<div class="modal" id="modal">
    <div class="modal-content">
        <h3>Detail Data Kendaraan</h3>
        <div id="vehicle_details"></div>
        <div class="modal-buttons">
            <button class="close-button" onclick="closeModal()">Tutup</button>
        </div>
    </div>
</div>

<!-- Modal Pop-up untuk Hapus Akun Kendaraan -->
<div class="delete-modal" id="delete-modal">
    <div class="delete-modal-content">
        <p>Apakah Anda yakin ingin menghapus data kendaraan ini?</p>
        <div class="delete-modal-buttons">
            <button class="confirm-button" onclick="confirmDeleteVehicle()">Hapus</button>
            <button class="cancel-button" onclick="closeDeleteModal()">Batal</button>
        </div>
    </div>
</div>

<script>
    function openModal(vehicle_id) {
        fetch(`/vehicle/${vehicle_id}/details`)
            .then(response => response.json())  
            .then(data => {
                var vehicleDetails = `
                    <p>Nomor Polisi: ${data.vehicle_plate}</p><br>
                    <p>Tahun Pembuatan: ${data.year}</p><br>
                    <p>Jenis Kendaraan: ${data.vehicle_type}</p><br>
                    <p>No. STNK: ${data.vehicle_registration}</p><br>
                    <p>Masa Berlaku STNK: ${data.registration_expired}</p><br>
                    <p>Masa Berlaku Pajak: ${data.vehicle_tax}</p><br>
                    <p>Masa Berlaku Keur Kepala: ${data.head_cover_date}</p><br>
                    <p>Masa Berlaku Keur Ekor: ${data.tail_cover_date}</p><br>
                    <p>Keterangan: ${data.note}</p><br>
                `;
                document.getElementById('vehicle_details').innerHTML = vehicleDetails;

                document.getElementById('modal').style.display = 'flex';
            })
            .catch(error => console.error('Error fetching vehicle data:', error));  // Error handling
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
    }

    let currentVehicleId; // Menyimpan ID kendaraan yang ingin dihapus

    function openDeleteModal(vehicleId) {
        currentVehicleId = vehicleId; // Simpan ID kendaraan untuk digunakan saat konfirmasi
        document.getElementById('delete-modal').style.display = 'flex'; // Tampilkan modal
    }

    function closeDeleteModal() {
        document.getElementById('delete-modal').style.display = 'none';
    }

    function confirmDeleteVehicle() {
        // Lakukan penghapusan data kendaraan dengan ID yang tersimpan
        fetch(`/admin_inputvehicle/${currentVehicleId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',  // Diperlukan untuk Laravel CSRF protection
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Data berhasil dihapus');
                location.reload(); // Reload halaman jika berhasil
            } else {
                alert('Gagal menghapus data');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghapus data');
        })
        .finally(() => {
            closeDeleteModal(); // Tutup modal setelah penghapusan selesai
        });
    }
</script>

</body>
</html>