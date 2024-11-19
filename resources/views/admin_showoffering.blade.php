<!DOCTYPE html>
< lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tawaran</title>
    <link rel="stylesheet" href="styledash.css">
</head>

<header>
    <div class="sidebar">
    <ul>
            <h2>SIVASAK</h2>
            <li><img src="home.png" alt=""><a href="/admin_dashboard">Dashboard</a></li>
            <li><img src="pb.png" alt=""><a href="/admin_showoffering">Buat Tawaran</a></li>
            <li><img src="cb.png" alt=""><a href="/admin_vendorselection">Seleksi Vendor</a></li>
            <li><img src="sh.png" alt=""><a href="/admin_negotiate">Negosiasi</a></li>
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
    <h2>Daftar Tawaran</h2>

    <div class="wrapper">
        <div class="button-container-tawaran">
            <button class="tambah-button" onclick="window.location.href='/admin_offering'">Tambah Tawaran</button>
        </div>

        <div class="search-container-tawaran">
            <input type="text" placeholder="Cari Tawaran">
            <button class="search-button">Cari</button>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Judul Tawaran</th>
                    <th>Jenis Barang</th>
                    <th>Range Harga</th>
                    <th>Deskripsi Barang</th>
                    <th>Masa Berlaku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr>
                    <td>{{$item->item_name}}</td>
                    <td>{{$item->item_type}}</td>
                    <td>{{ (new \NumberFormatter('id_ID', \NumberFormatter::CURRENCY))->formatCurrency($item->item_price, 'IDR') }}</td>
                    <td>{{$item->item_desc}}</td>
                    <td>{{$item->expired_date}}</td>
                    <td>
                        <button class="edit-button" onclick="window.location.href='{{ route('admin_editoffering', ['item_id' => $item->item_id]) }}'">Edit</button>
                        <button class="delete-button" onclick="openDeleteModal({{ $item->item_id }})">Hapus</button>
                        <button class="cek-button" onclick="openModal({{ $item->item_id }})">Cek</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text_center">Tidak ada data barang.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Pop-up untuk Cek item -->
<div class="modal" id="modal">
    <div class="modal-content">
        <h3>Detail Tawaran</h3>
        <div id="item_details"></div>
        <div class="modal-buttons">
            <button class="close-button" onclick="closeModal()">Tutup</button>
        </div>
    </div>
</div>

<!-- Modal Pop-up untuk Hapus item -->
<div class="delete-modal" id="delete-modal">
    <div class="delete-modal-content">
        <p>Hapus data tawaran?</p>
        <div class="delete-modal-buttons">
            <button class="delete-button" onclick="confirmDeleteItem()">Hapus</button>
            <button class="close-button" onclick="closeDeleteModal()">Batal</button>
        </div>
    </div>
</div>

<script>
let currentItemId;

    function openModal(item_id) {
        fetch(`/item/${item_id}/details`)
            .then(response => response.json())  
            .then(data => {
                var itemDetails = `
                    <p>Judul Tawaran : ${data.item_name}</p><br>
                    <p>Jenis Barang : ${data.item_type}</p><br>
                    <p>Range Harga : Rp ${data.item_price}</p><br>
                    <p>Deskripsi : ${data.item_desc}</p><br>
                    <p>Masa Berlaku : ${data.expired_date}</p><br>
                `;
                document.getElementById('item_details').innerHTML = itemDetails;

                document.getElementById('modal').style.display = 'flex';
            })
            .catch(error => console.error('Error fetching item data:', error));
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
    }

    function openDeleteModal(itemId) {
        currentItemId =itemId;
        document.getElementById('delete-modal').style.display = 'flex';
    }

    function closeDeleteModal() {
        document.getElementById('delete-modal').style.display = 'none';
    }

    function confirmDeleteItem() {
        fetch(`/admin_offering/${currentItemId}`, {
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

</html>
