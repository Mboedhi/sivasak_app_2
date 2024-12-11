<!DOCTYPE html>
<html>

<head>
    <title>Negosiasi</title>
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
                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div class="content">
        <h2>Daftar Negosiasi</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nama Vendor</th>
                        <th>Nama Barang</th>
                        <th>Harga Tawaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($negotiations as $negotiate)
                        <tr>
                            <td>{{ $negotiate->item_assessment->vendor->company_name ?? 'N/A'}}</td>
                            <td>{{ $negotiate->item_assessment->item->item_name ?? 'N/A'}}</td>
                            <td>{{ number_format($negotiate->price_nego, 0, ',', '.' ?? 'N/A')}}</td>
                            <td>{{ $negotiate->result ?? 'N/A'}}</td>
                            <td>
                                <!-- Tombol Terima -->
                                <button class="accept-button" onclick="submitRequest('{{ url('/admin_negotiate/terima', $negotiate->negotiate_id) }}', 'POST')">Terima</button>

                                <!-- Tombol Tolak -->
                                <button class="delete-button" onclick="submitRequest('{{ url('/admin_negotiate/tolak', $negotiate->negotiate_id) }}', 'POST')">Tolak</button>

                                <!-- Tombol Hapus -->
                                <button class="cek-button" onclick="submitRequest('{{ url('/admin_negotiate/hapus', $negotiate->negotiate_id) }}', 'DELETE')">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                    <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Pop-up untuk Cek Tender -->
    <div class="modal" id="modal">
        <div class="modal-content">
            <h3>Detail Negosiasi</h3>
            <p>Nama Vendor: Vendor A</p>
            <p>Nama Barang: test</p>
            <p>Harga Tawaran: Rp 10.000.000</p>
            <p>Catatan : Tawaran pertama</p>
            <div class="modal-buttons">
                <button class="close-button" onclick="closeModal()">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Modal Pop-up untuk Hapus Tender -->
    <div class="delete-modal" id="delete-modal">
        <div class="delete-modal-content">
            <p>Hapus data negosiasi?</p>
            <div class="delete-modal-buttons">
                <button class="confirm-button" onclick="deleteTender()">Hapus</button>
                <button class="cancel-button" onclick="closeDeleteModal()">Batal</button>
            </div>
        </div>
    </div>

    <script>
        function submitRequest(url, method) {
            // Buat request menggunakan Fetch API
            fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                if (response.ok) {
                    alert('Aksi berhasil dilakukan!');
                    location.reload(); // Reload halaman setelah aksi berhasil
                } else {
                    alert('Terjadi kesalahan saat melakukan aksi.');
                }
            }).catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan.');
            });
        }

        function openModal() {
            document.getElementById('modal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }

        // function openDeleteModal() {
        //     document.getElementById('delete-modal').style.display = 'flex';
        // }

        function closeDeleteModal() {
            document.getElementById('delete-modal').style.display = 'none';
        }

        function deleteTender() {
            alert("Data tender dihapus");
            closeDeleteModal();
        }
    </script>

</body>

</html>