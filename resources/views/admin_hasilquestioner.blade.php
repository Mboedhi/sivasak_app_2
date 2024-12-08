<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Vendor</title>
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
    <!-- Header Section -->
    <div class="navbar">
        <div class="menu">
            <ul>
                <li><a href="#">Admin</a><img src="bp.png" alt=""></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="content">
        <!-- Title and Back Button -->

        <h2>Hasil Questioner</h2>
        <button class="back-tombol" onclick="{{ route('admin_daftarquestioner') }}">Kembali</button>
        <!-- Table for displaying questions and answers -->

        <div class="table-content">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Daftar Pertanyaan</th>
                        <th>Jawaban</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item => $question)
                        <tr>
                            <td>{{ $item + 1 }}</td>
                            <td>{{ $question['question'] }}</td>
                            @if ($question['id'] == 8 || $question['id'] == 14)
                                @if ($question['id'] == 8)
                                    @if ($question['answer'] == 'Ada')
                                        <td>{{ $question['answer'] }}: {{ $question['explanation'] }} </td>
                                    @else
                                        <td>{{ $question['answer'] }}</td>
                                    @endif
                                @endif
                                @if ($question['id'] == 14)
                                    @if ($question['answer'] == 'Ada')
                                        <td>{{ $question['answer'] }}, Kapan: {{ $question['explanation'] }} </td>
                                    @else
                                        <td>{{ $question['answer'] }}</td>
                                    @endif
                                @endif
                            @else
                                <td>{{ $question['answer'] }}</td>
                            @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
