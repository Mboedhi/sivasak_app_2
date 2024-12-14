<!DOCTYPE html>
<html>

<head>
    <title>Daftar Tender</title>
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
        <h2>Daftar Tender</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nama Vendor</th>
                        <!-- <th>Harga Tawaran</th>
                        <th>Judul</th> -->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($vendor as $item)
                        <tr>
                            <td>{{ $item->company_name ?? 'N/A' }}</td>
                            <!-- <td> {{ $item->item_assessment->negotiate->price_nego ?? 'N/A'}} </td>
                            <td>{{ $item->item_assessment->item->item_name ?? 'N/A'}}</td> -->
                            <td>
                                <button class="edit-button" onclick="openModal(this)"
                                    data-company-name="{{ $item->company_name }}"
                                    data-company-type="{{ $item->company_type }}" data-address="{{ $item->address }}"
                                    data-phone="{{ $item->user->phone_number }}"
                                    data-title="{{ $item->item_assessment->item->item_name }}"  
                                    data-price="{{ $item->item_assessment->negotiate->price_nego ?? 'N/A'}}"
                                    data-npwp="{{ $item->NPWP }}">Cek</button>
                                <!-- <form action="{{ url('/admin_tendercontrol/hapus', $item->vendor_id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete-button" type="submit">Hapus</button>
                                </form> -->
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
            <h3>Detail Tender</h3>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <div class="modal-buttons">
                <button class="close-button" onclick="closeModal()">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Modal Pop-up untuk Hapus Tender -->
    <div class="delete-modal" id="delete-modal">
        <div class="delete-modal-content">
            <p>Hapus data tender?</p>
            <div class="delete-modal-buttons">
                <button class="confirm-button" onclick="deleteTender()">Hapus</button>
                <button class="cancel-button" onclick="closeDeleteModal()">Batal</button>
            </div>
        </div>
    </div>

    <script>
        function openModal(button) {
            const modal = document.getElementById('modal');
            const companyName = button.getAttribute('data-company-name');
            const companyType = button.getAttribute('data-company-type');
            const address = button.getAttribute('data-address');
            const phone = button.getAttribute('data-phone');
            const title = button.getAttribute('data-title');
            const description = button.getAttribute('data-description');
            const price = button.getAttribute('data-price');
            const npwp = button.getAttribute('data-npwp');

            modal.querySelector('p:nth-child(2)').textContent = `Nama Vendor: ${companyName}`;
            modal.querySelector('p:nth-child(3)').textContent = `Tipe Perusahaan: ${companyType}`;
            modal.querySelector('p:nth-child(4)').textContent = `Alamat Perusahaan: ${address}`;
            modal.querySelector('p:nth-child(5)').textContent = `No. Telepon: ${phone}`;
            modal.querySelector('p:nth-child(6)').textContent = `Judul: ${title}`;
            modal.querySelector('p:nth-child(7)').textContent = `Deskripsi: ${description}`;
            modal.querySelector('p:nth-child(8)').textContent = `Harga: Rp ${price}`;
            modal.querySelector('p:nth-child(9)').textContent = `NPWP: ${npwp}`;

            modal.style.display = 'flex';


        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }

        function openDeleteModal() {
            document.getElementById('delete-modal').style.display = 'flex';
        }

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