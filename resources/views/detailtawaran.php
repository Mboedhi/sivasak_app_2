<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tawaran</title>
    <link rel="stylesheet" href="styledash.css">
</head>
<div>

<!-- Sidebar -->
<div class="sidebar">
    <ul>
        <h2>SIVASAK</h2>
        <li><img src="home.png" alt=""><a href="dashboardvendor.php">Dashboard</a></li>
        <li><img src="sh.png" alt=""><a href="negosiasivendor.php">Negosiasi</a></li>
        <li><img src="pb.png" alt=""><a href="daftartawaran.php">Daftar Tawaran Perusahaan</a></li>
    </ul>
</div>

<!-- Navbar -->
<div class="navbar">
    <div class="menu">
        <ul>
            <li><a href="#">Vendor</a><img src="bp.png" alt=""></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</div>

<!-- Detail Tawaran Section -->
<div class="content">
    <div class="offer-details main-content">
        <h2>Detail Tawaran</h2>
        <div class="details-box">
            <table>
                <tr>
                    <td>Judul Tawaran</td>
                    <td>: Dibutuhkan Supply Air Mineral</td>
                </tr>
                <tr>
                    <td>Jenis Barang</td>
                    <td>: Minuman</td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>: Air Mineral, 25 dus, 600 ml, merk bebas</td>
                </tr>
                <tr>
                    <td>Range Harga (Rp)</td>
                    <td>: Rp1.000.000</td>
                </tr>
                <tr>
                    <td>Masa Berlaku</td>
                    <td>: 20/05/2020</td>
                </tr>
                <tr>
                    <td>Lampiran</td>
                    <td>: <a href="lampiran.pdf">lampiran.pdf</a></td>
            </table>
            <div class="button-isi">
            <button class="isi-button" onclick="openIsiModal()">Isi</button>
        </div>
        
    </div>
    </div>

    <!-- Modal Pop-up for Isi Form -->
    <div class="modal" id="isi-modal">
        <div class="modal-content">
            <h3>Isi Form</h3>
            <form action="submit_isi.php" method="POST">
                <label for="quantity">Jumlah Barang:</label>
                <input type="number" id="quantity" name="quantity" required>

                <label for="notes">Catatan:</label>
                <textarea id="notes" name="notes" rows="4"></textarea>

                <div class="modal-buttons">
                    <button type="submit" class="submit-button">Kirim</button>
                    <button type="button" class="close-button" onclick="closeIsiModal()">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openIsiModal() {
        document.getElementById('isi-modal').style.display = 'flex';
    }

    function closeIsiModal() {
        document.getElementById('isi-modal').style.display = 'none';
    }
</script>

</body>
</html>
