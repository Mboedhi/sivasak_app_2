<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Tawaran</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    .navbar {
        background-color: #1565c0;
        color: black;
        padding: 10px;
        text-align: right;
        width: 100%;
        position: fixed;
        top: 0;
        z-index: 1000; /* Nilai z-index lebih rendah dari sidebar */
        height: 50px;
    }

    .akuntender{
        margin-left: 240px;
        padding: 40px;
        margin-top: 60px;
        position: center;
    }

    .sidebar {
        width: 200px;
        height: 100vh;
        background-color: #0A397F;
        position: fixed; /* Agar sidebar tetap di posisi yang diinginkan */
        top: 0; /* Agar sidebar dimulai dari atas, termasuk memotong navbar */
        left: 0;
        z-index: 2000; /* Nilai z-index lebih tinggi dari navbar */
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .sidebar ul li {
        padding: 10px;
    }

    .sidebar ul li a {
        text-decoration: none;
        color: whitesmoke;
        vertical-align: middle;
    }

    .sidebar ul li a:hover {
        color : cyan;
        text-decoration: underline;
    }

    .sidebar ul li img {
        width: 18px;
        height: 18px;
        margin-right: 10px;
        vertical-align: middle;
    }

    .sidebar ul h2 {
        text-align: center;
        color: white;
        margin-bottom: 70px;
    }

    .navbar ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .navbar ul li {
        display: inline;
        padding: 10px;
    }

    .navbar ul li a {
        text-decoration: none;
        color: black;
    }

    .navbar ul li img {
        width: 23px;
        height: 23px;
        margin-right: 10px;
    }

    .navbar ul li a:hover {
        color: white;
    }

    /* Main Content */
    .akun {
        margin-left: 240px;
        padding: 40px;
        margin-top: 60px;
    }

    .button-container {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 20px;
    }

    .tambah-button {
        background-color: #27ae60;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .tambah-button:hover {
        background-color: #2ecc71;
    }

    /* Table Styles */
    .table-container {
        background-color: white;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #3498db;
        color: white;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .edit-button, .cek-button, .delete-button {
        background-color: #3498db;
        color: white;
        padding: 8px 12px;
        margin: 0 5px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .edit-button {
        background-color: #f39c12;
    }

    .cek-button {
        background-color: #3498db;
    }

    .delete-button {
        background-color: #e74c3c;
    }

    .edit-button:hover {
        background-color: #e67e22;
    }

    .cek-button:hover {
        background-color: #2980b9;
    }

    .delete-button:hover {
        background-color: #c0392b;
    }

    /* Modal Pop-up Styles */
    .modal, .delete-modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-content, .delete-modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 400px;
        text-align: center;
    }

    .modal h3 {
        margin-bottom: 20px;
        color: #333;
    }

    .modal-buttons {
        display: flex;
        justify-content: space-between;
    }

    .close-button {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
    }

    .close-button:hover {
        background-color: #2980b9;
    }

    .delete-modal-buttons {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
    }

    .confirm-button {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .confirm-button:hover {
        background-color: #c0392b;
    }

    .cancel-button {
        background-color: #7f8c8d;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .cancel-button:hover {
        background-color: #95a5a6;
    }

    /* Form Container Styles */
    .form-container {
        background-color: white;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        max-width: 500px;
        margin: 0 auto;
    }

    .form-container label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #34495e;
    }

    .form-container input,
    .form-container select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        border-radius: 5px;
    }

    .form-container select {
        appearance: none;
    }

    .submit-button {
        background-color: #27ae60;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
    }

    .submit-button:hover {
        background-color: #2ecc71;
    }
    /* Form Container Styles */
    .form-container {
        background-color: white;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        max-width: 500px;
        margin: 0 auto;
    }

    .form-container label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #34495e;
    }

    .form-container input,
    .form-container select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    .form-container select {
        appearance: none;
    }

    .form-buttons {
        display: flex;
        justify-content: space-between;
    }

    .submit-button {
        background-color: #27ae60;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .submit-button:hover {
        background-color: #2ecc71;
    }

    .cancel-button {
        background-color: #e74c3c;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .cancel-button:hover {
        background-color: #c0392b;
    }

    .main-content {
        margin-left: 200px;
        padding: 80px 20px 20px 20px;
        background-color: #f4f4f4;
        min-height: 100vh;
        justify-content: center;
    }

    /* Dashboard Cards */
    .dashboard-cards {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .card {
        background-color: white;
        width: 30%;
        padding: 20px;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card h3 {
        margin-bottom: 10px;
        font-size: 20px;
    }

    .card p {
        font-size: 40px;
        margin: 10px 0;
    }

    .card button {
        background-color: transparent;
        border: 1px solid #333;
        padding: 5px 15px;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Card Colors */
    .card-1 {
        background-color: #007bff;
        color: white;
    }

    .card-2 {
        background-color: #dc3545;
        color: white;
    }

    .card-3 {
        background-color: #28a745;
        color: white;
    }

    /* Traffic Chart */
    .traffic-chart {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .akun h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    /* Buat Tawaran */
    .main-content h2 {
        text-align: center;
        margin-bottom: 20px;
        justify-content: center;
    }

    form {
        max-width: 600px;
        margin: 0 auto;
        background-color: #f4f4f4;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    form label {
        display: block;
        margin-bottom: 10px;
    }

    form input, form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    form button {
        width: 100%;
        padding: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    form button:hover {
        background-color: #218838;
    }

    /* Buat Tawaran End */

    .search-container {
        margin-bottom: 20px;
        float: right;
        border-radius: 5px;
    }

    .search-container input {
        width: 200px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .search-container button {
        padding: 10px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Dashboard Vendor */
    .vendor-info {
        margin-left: 240px;
        padding: 20px;
    }

    .vendor-info h2 {
        margin-bottom: 20px;
        color: #1E3A8A;
        font-weight: bold;
    }

    .info-container {
        background-color: #F9FAFB;
        border: 1px solid #D1D5DB;
        padding: 20px;
        border-radius: 8px;
        max-width: 600px;
    }

    .info-container table {
        width: 100%;
        border-collapse: collapse;
    }

    .info-container table tr {
        height: 40px;
    }

    .info-container table td {
        font-size: 16px;
        padding: 5px;
        color: #374151;
    }

    .info-container table td:first-child {
        font-weight: bold;
        color: #1E3A8A;
    }

    /* Pendaftaran Vendor */
    .offer-list {
        margin-left: 240px;
        padding: 20px;
    }

    .offer-list h2 {
        color: #1E3A8A;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .apply-btn {
        background-color: #10B981;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }

    .apply-btn:hover {
        background-color: #059669;
    }

    .offer-details {
        margin-left: 240px;
        padding: 20px;
    }

    .offer-details h2 {
        color: #1E3A8A;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .details-box {
        background-color: #F9FAFB;
        border: 1px solid #D1D5DB;
        padding: 20px;
        border-radius: 8px;
        max-width: 600px;
    }

    .details-box table {
        width: 100%;
        border-collapse: collapse;
    }

    .details-box table td {
        padding: 10px;
        font-size: 14px;
        color: #374151;
    }

    .details-box table td:first-child {
        font-weight: bold;
        color: #4B5563;
        width: 150px;
    }

    /* Negoasiasi Vendor */
    .negotiation-container {
        background-color: white;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        max-width: 500px;
        margin: auto;
    }
    .negotiation-container h2 {
        text-align: center;
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }
    .negotiation-form label {
        font-weight: bold;
        display: block;
        margin-bottom: 8px;
    }
    .negotiation-form input, .negotiation-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }
    .negotiation-form textarea {
        resize: none;
        height: 100px;
    }
    </style>
</head>
<body>

<header>
    <div class="sidebar">
        <ul>
            <h2>SIVASAK</h2>
            <li><img src="home.png" alt=""><a href="/admin_dashboard">Dashboard</a></li>
            <li><img src="pb.png" alt=""><a href="/admin_offering">Buat Tawaran</a></li>
            <li><img src="cb.png" alt=""><a href="/admin_vendorselection">Seleksi Vendor</a></li>
            <li><img src="sh.png" alt=""><a href="/admin_negotiate">Negoisasi</a></li>
            <li><img src="undo.png" alt=""><a href="/admin_tendercontrol">Kontrol Tender</a></li>
            <li><img src="bat.png" alt=""><a href="/admin_maketender">Buat Akun Tender</a></li>
            <li><img src="as.png" alt=""><a href="/admin_makedriver">Buat Akun Supir</a></li>
            <li><img src="file.png" alt=""><a href="/admin_vehicles">Data Kendaraan</a></li>
            <li><img src="alert.png" alt=""><a href="/admin_complainlist">Daftar Komplain</a></li>
        </ul>
    </div>
</header>

<div class="navbar">
    <div class="menu">
        <ul>
            <li><a href="#">Admin</a><img src="bp.png" alt=""></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</div>

<div class="main-content">
    <h2>Buat Tawaran</h2>
    <form action="submit_tawaran.php" method="post" enctype="multipart/form-data">
        <label for="judul-tawaran">Judul Tawaran</label>
        <input type="text" id="judul-tawaran" name="judul-tawaran" required>

        <label for="kendaraan">Jenis Barang</label>
        <input type="text" id="judul-tawaran" name="judul-tawaran" required>

        <label for="deskripsi">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="4" required></textarea>

        <label for="harga-total">Harga Total (Rp)</label>
        <input type="number" id="harga-total" name="harga-total" required>

        <label for="masa-berlaku">Masa Berlaku</label>
        <input type="date" id="masa-berlaku" name="masa-berlaku" required>

        <label for="lampiran">Lampiran</label>
        <input type="file" id="lampiran" name="lampiran">

        <button type="submit">Ajukan Tawaran</button>
    </form>
</div>

</body>
</html>