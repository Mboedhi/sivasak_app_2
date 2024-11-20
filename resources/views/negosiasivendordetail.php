<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Negosiasi Vendor</title>
    <link rel="stylesheet" href="styledash.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <ul>
            <h2>SIVASAK</h2>
            <li><img src="home.png" alt=""><a href="DashboardVendor.php">Dashboard</a></li>
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

    <!-- Isi -->
    <div class="content">
        <h2>Negosiasi Vendor</h2>
        <div class="negotiation-container">
            <form class="negotiation-form" action="submit_negotiation.php" method="POST">
                <label for="vendor-name">Nama Vendor</label>
                <input type="text" id="vendor-name" name="vendor_name" required>

                <label for="title">Judul</label>
                <input type="text" id="title" name="title" required>

                <label for="initial-price">Harga Awal</label>
                <div class="price-display">Rp.1.000.000</div>

                <label for="offer-price">Harga yang ingin ditawarkan</label>
                <input type="number" id="offer-price" name="offer_price" placeholder="Harga Negosiasi (harga harus dibawah harga awal)" required>

                <button type="submit" class="submit-button">Ajukan Negosiasi</button>
            </form>
        </div>
        <button class="back-tombol" onclick="window.location.href='negosiasivendor.php'" style="margin-left: 291px; margin-top: 20px;">Kembali</button>
    </div>

    <div class="footer">
            Copyright © 2024. All rights reserved.
    </div>

</body>
</html>
