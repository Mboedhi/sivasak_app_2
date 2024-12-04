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
                        <td><button class="apply-btn" onclick="openIsiModal({{$item->item_id}})">Ajukan</button></td>
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
            <form action="{{ route('vendor_store_offer') }}" method="POST">
                @csrf
                <input type="hidden" name="item_id" id="item_id_modal">
                <input type="hidden" name="vendor_id" value="{{ auth()->user()->vendor->vendor_id }}">

                <label for="quantity">Jumlah Barang:</label>
                <input type="number" id="quantity" name="assessment_amount" required>

                <label for="notes">Catatan:</label>
                <textarea id="notes" name="assessment_note" rows="4"></textarea>

                <div class="modal-buttons">
                    <button type="submit" class="submit-button">Kirim</button>
                    <button type="button" class="close-button" onclick="closeIsiModal()">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openIsiModal(itemId) {
        document.getElementById('item_id_modal').value = itemId;
        document.getElementById('isi-modal').style.display = 'flex';
    }

    function closeIsiModal() {
        document.getElementById('isi-modal').style.display = 'none';
    }
</script>
</div>
</body>
</html>
