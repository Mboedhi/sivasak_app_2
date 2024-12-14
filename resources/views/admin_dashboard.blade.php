<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="styledash.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <!-- Sidebar -->
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

    <!-- Navbar -->
    <div class="navbar">
        <div class="menu">
            <ul>
                <li><a href="#">Admin</a><img src="bp.png" alt=""></li>
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

    <!-- Main Content -->
    <div class="content">
        <!-- Dashboard Cards Section -->
        <div class="dashboard-cards">
            <div class="card card-1">
                <h3>Data Supir</h3>
                <p>{{$dataSupir}}</p>
                
            </div>
            <div class="card card-2">
                <h3>Data Vendor</h3>
                <p>{{$dataVendor}}</p>
                
            </div>
            <div class="card card-3">
                <h3>Daftar Komplain</h3>
                <p>{{$dataKomplain}}</p>
                
            </div>
        </div>

        <!-- Traffic Chart Section -->
        <div class="traffic-chart">
            <canvas id="trafficChart"></canvas>
        </div>
    </div>

    <!-- Include script to render the chart using Chart.js -->
    <script>
        var ctx = document.getElementById('trafficChart').getContext('2d');
        var trafficChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Data Supir', 'Data Vendor', 'Daftar Komplain'],
                datasets: [{
                    label: 'Traffic',
                    data: [{{ (int) $dataSupir}},{{ (int) $dataVendor}},{{ (int) $dataKomplain}}],
                    backgroundColor: [
                        '#007bff', // Blue
                        '#dc3545', // Red
                        '#28a745'  // Green
                    ],
                    borderColor: [
                        '#004085', '#721c24', '#155724'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>