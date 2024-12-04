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

<!-- Content Section -->
<div class="content">
    <h2 class="form-title">Questioner Supplier PT PGP</h2>
    <div class="form-container-kuisoner">
        <form action="{{route('vendor_questioner.submit')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Question 1 -->
            <label>1. Apakah bisnis utama anda yang sudah berjalan berkaitan dengan barang atau jasa yang akan dipasok?</label>
            <select name="answer_1" required>
                <option value="">Pilih pengalaman</option>
                <option value=">5 tahun">>5 tahun</option>
                <option value="3-5 tahun">3-5 tahun</option>
                <option value="1-3 tahun">1-3 tahun</option>
                <option value="<1 tahun">Kurang dari 1 tahun</option>
                <option value="bukan bisnis utama">Bukan bisnis utama</option>
            </select>

            <!-- Question 2 -->
            <label>2. Apakah perusahaan anda merupakan distributor resmi dari barang atau jasa yang anda pasok?</label>
            <select name="answer_2" required>
                <option value="">Pilih jawaban</option>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
            </select>

            <!-- Question 3 -->
            <label>3. Jelaskan rangkaian bisnis anda sampai ke PT PGP</label>
            <select name="answer_3" required>
                <option value="">Pilih rangkaian bisnis</option>
                <option value="Langsung">Langsung dari Sumber/Pabrik</option>
                <option value="Tidak langsung">Tidak Langsung</option>
                <option value="Surat penunjukan">Ada surat penunjukan dari manufacture/sumber</option>
                <option value="Tidak ada surat">Tidak ada surat penunjukan dari manufacture/sumber</option>
            </select>

            <!-- Question 4 -->
            <label>4. Apa spesifikasi produk / jasa anda?</label>
            <textarea name="answer_4" rows="4" required></textarea>

            <!-- Question 5 -->
            <label>5. Apakah perusahaan anda dapat memberikan harga dan kualitas terbaik dari barang / jasa yang anda pasok?</label>
            <select name="answer_5" required>
                <option value="">Pilih jawaban</option>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
            </select>

            <!-- Question 6 -->
            <label>6. Apakah perusahaan anda memiliki jaminan klaim terhadap barang / jasa yang anda pasok?</label>
            <select name="answer_6" required>
                <option value="">Pilih jawaban</option>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
            </select>

            <!-- Question 7 -->
            <label>7. Apakah perusahaan anda dapat memberikan ketepatan waktu dalam pengiriman dari barang / jasa yang kami pesan?</label>
            <select name="answer_7" required>
                <option value="">Pilih jawaban</option>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
            </select>

            <!-- Question 8 -->
            <div class="question">
                <label>8. Apakah ada peristiwa penting menyangkut sertifikasi produk/ jasa atau sistem manajemen, penghargaan, dan lain-lain yang diterima oleh perusahaan anda?</label>
            </div>

            <!-- Dropdown untuk pilihan jawaban -->
            <select class="select-answer" onchange="toggleExplanationField(this)" name="answer_8" required>
                <option value="">Pilih jawaban</option>
                <option value="Ada">Ada (Jelaskan)</option>
                <option value="Tidak Ada">Tidak Ada</option>
            </select>

            <!-- Field untuk penjelasan -->
            <div class="explanation-field" id="explanationField">
                <label for="keterangan_peristiwa">Jelaskan:</label>
                <textarea name="explanation_8" id="keterangan_peristiwa" rows="3" placeholder="....................................................................."></textarea>
            </div>


            <!-- Question 9 -->
            <label>9. Apakah ada penjualan / pekerjaan ekspor produk / jasa anda?</label>
            <select name="answer_9" required>
                <option value="">Pilih jawaban</option>
                <option value="Ada">Ada</option>
                <option value="Tidak Ada">Tidak ada</option>
            </select>

            <!-- Question 10 -->
            <label>10. Berapa persen pelanggan anda yang mempunyai kontrak jangka panjang? (sebutkan)</label>
            <input type="text" name="answer_10" placeholder="Isi persentase (%)">

            <!-- Question 11 -->
            <label>11. Siapa saja pelanggan potensial dan utama anda (sebutkan)</label>
            <input type="text" name="answer_11">

            <!-- Question 12 -->
            <label>12. Apakah anda memiliki fasilitas transportasi sendiri?</label>
            <select name="answer_12" required>
                <option value="">Pilih jawaban</option>
                <option value="Ya">Ya</option>
                <option value="Truk atau sejenisnya">Truk atau sejenisnya</option>
                <option value="Tidak">Tidak</option>
            </select>

            <!-- Question 13 -->
            <label>13. Apakah perusahaan anda memiliki gudang penyimpanan barang / pool kendaraan sendiri?</label>
            <select name="answer_13" required>
                <option value="">Pilih jawaban</option>
                <option value="Ada">Ada</option>
                <option value="Tidak ada">Tidak ada</option>
            </select>

            <!-- Question 14 -->
            <div class="question">
                <label>14. Apakah ada rencana pengembangan usaha?</label>
            </div>

            <!-- Table layout untuk pilihan jawaban -->
            <div class="table-container">
                <!-- Dropdown pilihan jawaban -->
                <div class="table-row">
                    <div class="table-cell">
                        <select class="select-answer" onchange="toggleExplanationField14(this)" name="answer_14" required>
                            <option value="">Pilih jawaban</option>
                            <option value="Ada">Ada (Jelaskan)</option>
                            <option value="Tidak Ada">Tidak Ada</option>
                        </select>
                    </div>
                </div>
                
                <!-- Kolom penjelasan (muncul jika "Ada" dipilih) -->
                <div class="table-row explanation-field" id="explanationField14">
                    <div class="table-cell">
                        <label for="keterangan_pengembangan">Jelaskan:</label>
                        <textarea name="explanation_14" id="keterangan_pengembangan" rows="3" placeholder="....................................................................."></textarea>
                    </div>
                </div>
            </div>

            
            
            <!-- Submit Button -->
            <button type="submit" class="submit-button" onclick="window.location.href='questioner.php'">Submit</button>
        </form>
    </div>
</div>

<script>
function toggleExplanationField(select) {
    const explanationField = document.getElementById("explanationField");
    if (select.value === "Ada") {
        explanationField.style.display = "block";
    } else {
        explanationField.style.display = "none";
    }
}
function toggleExplanationField14(select) {
    const explanationField14 = document.getElementById("explanationField14");
    if (select.value === "Ada") {
        explanationField14.style.display = "table-row";
    } else {
        explanationField14.style.display = "table-row";
    }
}
</script>

</body>
</html>
