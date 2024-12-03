<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Tawaran</title>
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

<!-- Daftar Tawaran Section -->
<div class="content">   
    <div class="offer-list">
        <h2>Daftar Tawaran</h2>

         <!-- Tombol Pencari -->
    <div class="search-container">
        <input type="text" placeholder="">
        <button class="search-button">Cari</button>
    </div>

        <!-- <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th><input type="checkbox"></th>
                        <th>Judul Tawaran</th>
                        <th>Jenis Barang</th>
                        <th>Range Harga</th>
                        <th>Masa Berlaku</th>
                        <th>Deskripsi</th>
                        <th>Lampiran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                     Example rows, these should be populated dynamically
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>Education Supply</td> 
                        <td>Alat Tulis</td>
                        <td>Rp1.000.000 - Rp5.000.000</td>
                        <td>25/05/2023</td>
                        <td>contoh</td>
                        <td> - </td>
                        <td><a href="detailtawaran.php"><button class="apply-btn">Cek</button></a></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>Medical Equipment</td>
                        <td>Peralatan Medis</td>
                        <td>Rp5.000.000 - Rp10.000.000</td>
                        <td>01/06/2023</td>
                        <td> contoh </td>
                        <td> -</td>
                        <td><a href="detailtawaran.php"><button class="apply-btn">Cek</button></a></td>
                    </tr>
                    
                </tbody>
            </table>
        </div> -->
            <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Judul Tawaran</th>
                        <th>Jenis Barang</th>
                        <th>Range Harga</th>
                        <th>Masa Berlaku</th>
                        <th>Deskripsi Barang</th>
                        <th>Lampiran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                    <tr>
                        <td>{{$item->item_name}}</td>
                        <td>{{$item->item_type}}</td>
                        <td>{{ (new \NumberFormatter('id_ID', \NumberFormatter::CURRENCY))->formatCurrency($item->item_price, 'IDR') }}</td>
                        <td>{{$item->expired_date}}</td>
                        <td>{{$item->item_desc}}</td>
                        <td>
                            @if($item->attachment)
                                <a href="{{ asset('storage/attachments/' . basename($item->attachment)) }}" download>
                                <button class="apply-btn">Download</button>
                                </a>
                            @else
                                Tidak ada lampiran
                            @endif
                        </td>
                        <td><button class="apply-btn" onclick="openIsiModal()">Ajukan</button></td>
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
</div>
</body>
</html>
