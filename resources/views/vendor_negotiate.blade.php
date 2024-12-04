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
        <h2>Daftar Negosiasi</h2>
        <div class="search-container">
            <input type="text" placeholder="Cari Negosiasi...">
            <button class="search-button">Cari</button>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nama Vendor</th>
                        <th>Judul</th>
                        <th>Harga Awal</th>
                        <th>Harga Negosiasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Sample data - replace with database query
                    $data = array(
                        array("PT. JAYA", "12345/789", "Rp.100.000.000", "Rp.90.000.000", "Disetujui"),
                        array("PT. JAYA", "12345/789", "Rp.100.000.000", "Rp.90.000.000", "Disetujui"),
                        array("PT. JAYA", "12345/789", "Rp.100.000.000", "Rp.90.000.000", "Disetujui"),
                        array("PT. JAYA", "12345/789", "Rp.100.000.000", "Rp.90.000.000", "Disetujui"),
                    );

                    foreach($data as $row) {
                        echo "<tr>";
                        echo "<td>{$row[0]}</td>";
                        echo "<td>{$row[1]}</td>";
                        echo "<td>{$row[2]}</td>";
                        echo "<td>{$row[3]}</td>";
                        echo "<td><span class='status'>{$row[4]}</span></td>";
                        echo "<td>
                                <a href='negosiasivendordetail.php?id={$row[0]}' style='text-decoration: none;'>
                                    <button class='cek-button'>Cek</button>
                                </a>
                                <button class='delete-button' onclick='openDeleteModal()'>Hapus</button>
                                </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
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
