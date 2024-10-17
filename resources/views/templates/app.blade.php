<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- $title diambil dari extends ['title' => '...'] -->
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- icon bar -->
    <link rel="icon" type ="image/x-icon"
        href="https://media.istockphoto.com/id/894420244/id/vektor/logo-bioskop.jpg?s=170667a&w=0&k=20&c=S6lLRkIU-d97zTD_I7a60UtZe-axjQtee4NEZnAOPPY=">
    <!-- stack : wadah penampung content dinamis namum optional ( tidak selalu digunakan ) biasanya untuk wadah styling tambahan atau script tambahan -->
    @stack('style')
</head>
<!-- <body class ="mx-5"> -->

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Bioskop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @if (Auth::check())
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <!-- Route::is -> mengecek name route yang lagi di akses -->
                            <!-- kalau name route yang lagi diakses itu welcome, kasih class active(warna teks item), kalau bukan active ga munculin (warna teks abuabu) -->
                            <a class="nav-link {{ Route::is('welcome') ? 'active' : '' }}" aria-current="page"
                                href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <!-- {{-- pemanggilan route pada href ada dua yaitu :
            1. path (/)
            2. name -> {{ route('nama_route') }} : lebih baik
            --}} -->
                            <a class="nav-link {{ Route::is('landing-page') ? 'active' : '' }}" aria-current="page"
                                href="landing-page">Landing</a>
                        </li>
                        @if (Auth::user()->role == 'admin')
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('bioskop') ? 'active' : '' }}" aria-current="page"
                                    href="{{ route('bioskop') }}">Data film</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('user') ? 'active' : '' }}" aria-current="page"
                                    href="{{ route('user') }}">Kelola Akun</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
                        <!-- <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li> -->
                    </ul>
                    <form class="d-flex" role="search" action="{{ route('bioskop') }}" method="GET">
                        <!-- mengaktifkan form di laravel :
          1. pastikan form ada action dan method
          - GET : ketika form berfungsi untuk search
          - POST : ketika form berfungsi untuk menabahkan/mengubah/mengahpus data
          2. pastikan button type submit
          3. di input harus ada name
          -->
                        <input class="form-control me-2" type="text" placeholder="Search film"
                            aria-label="Search" name="search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <form class="d-flex" role="search" action="{{ route('user') }}" method="GET">
                        <!-- mengaktifkan form di laravel :
          1. pastikan form ada action dan method
          - GET : ketika form berfungsi untuk search
          - POST : ketika form berfungsi untuk menabahkan/mengubah/mengahpus data
          2. pastikan button type submit
          3. di input harus ada name
          -->
                        <input class="form-control me-2" type="text" placeholder="Search user" aria-label="Search"
                            name="search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
            @endif
        </div>
        </div>
    </nav>
    <!-- wadah untuk penampung content yang berbeda ditiap halamannya  -->
    @yield('content-dinamis')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstra p.bundle.min.js"></script>
    @stack('script')
</body>

</html>
