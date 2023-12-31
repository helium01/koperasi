<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Koperasi Pabrik Gula</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="{{asset('admin')}}/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="{{asset('admin')}}/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{asset('admin')}}/css/templatemo-style.css">
    <style>
        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group select  {
            background-color: white;
            color: black;
        }
        .form-group select option {
        background-color: white;
        color: black;
    }
    #searchResults {
    max-height: 200px; /* Set the maximum height according to your design */
    overflow-y: auto;
}
    </style>
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="/">
                    <h1 class="tm-site-title mb-0">KOPKAR PABRIK GULA DJATIROTO</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="/">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/nomor_perkiraans">
                                <i class="far fa-file-alt"></i>
                                Nomor Perkiraan
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-file-alt"></i>
                                <span>
                                    Peroses Awal <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/rab_tahunans">Isi RAB Tahun Ini</a>
                                <a class="dropdown-item" href="/saldo_awals">Isi Proses Saldo Awal</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-file-alt"></i>
                                <span>
                                    Data Harian <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/data_kas_banks">Koreksi Masukan Data Kas/Bank</a>
                                <a class="dropdown-item" href="/memorials">Masukan Koreksi Data Memorial</a>
                                <a class="dropdown-item" href="/suplements">Masukan Koreksi Data Memo Suplement</a>
                                <a class="dropdown-item" href="/penutups">Masukan Koreksi Data Memo Penutup</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-file-alt"></i>
                                <span>
                                    Cetak <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/cetak/neraca/view">NERACA</a>
                                <a class="dropdown-item" href="/cetak/neraca_lajur/view">Neraca Lajur</a>
                                <a class="dropdown-item" href="/cetak/neraca_aktifa_pasifa/view">Neraca Aktifa Pasifa</a>
                                <a class="dropdown-item" href="/cetak/laba_rugi/view">Laba Rugi</a>
                                <a class="dropdown-item" href="/cetak/memorial_saldo_awal/view">Saldo Awal</a>
                                <a class="dropdown-item" href="/cetak/lembar_pemeriksaan/view">Lembar Pemeriksaan</a>
                                <a class="dropdown-item" href="/cetak/buku_besar/no_perkiraan/view">Buku Besar/Sub Buku Besar</a>
                                <a class="dropdown-item" href="/cetak/seluruh_kartu_bukubesar/view">Seluruh Kartu Buku Besar</a>
                                <a class="dropdown-item" href="/cetak/memorial_pemindah_bukuan/view">Memorial Pemindah Bukuan</a>
                            </div>
                        </li>

                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                Admin, <b>Logout</b>
                            </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
        @yield('content')
        <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b>2018</b> All rights reserved. 
                    
                    Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="{{asset('admin')}}/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="{{asset('admin')}}/js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="{{asset('admin')}}/js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="{{asset('admin')}}/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="{{asset('admin')}}/js/tooplate-scripts.js"></script>
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();                
            });
        })
    </script>
</body>

</html>