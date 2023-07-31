<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIPAL - @yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/icon.ico') }}" />

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/fd8370ec87.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/backend-plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend.css?v=1.0.0') }}">
</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <div class="iq-sidebar sidebar-default  ">
            <div class="iq-sidebar-logo d-flex align-items-end justify-content-between">
                <a href="{{ route('home') }}" class="header-logo">
                    <i class="text-white fas fa-code"></i>
                    <span>SIPAL</span>
                </a>
                <div class="side-menu-bt-sidebar-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-light wrapper-menu" width="30"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
            <div class="data-scrollbar" data-scroll="1">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="side-menu">
                        <li class="@if (request()->routeIs('home')) active @endif sidebar-layout">
                            <a href="{{ route('home') }}" class="svg-icon">
                                <i class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </i>
                                <span class="ml-2">Dashboard</span>
                            </a>
                        </li>
                        <li class="px-3 pt-3 pb-2">
                            <span class="text-uppercase small font-weight-bold">Data</span>
                        </li>
                        <li class="sidebar-layout">
                            <a href="#app1" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="ml-2">Data User</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon iq-arrow-right arrow-active"
                                    width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                            <ul id="app1" class="submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="@if (request()->routeIs('member')) active @endif sidebar-layout">
                                    <a href="{{ route('member') }}" class="svg-icon">
                                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                        <span class="">Data Siswa</span>
                                    </a>
                                </li>
                                <li class="@if (request()->routeIs('karyawan')) active @endif sidebar-layout">
                                    <a href="{{ route('karyawan') }}" class="svg-icon">
                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                        <span class="">Data Toolman</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- Data Barang --}}
                        <li class="sidebar-layout">
                            <a href="#app2" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                                <i class="fa-solid fa-box-open"></i>
                                <span class="ml-2">Data Barang</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon iq-arrow-right arrow-active"
                                    width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                            <ul id="app2" class="submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="@if (request()->routeIs('kategori_alat')) active @endif sidebar-layout">
                                    <a href="{{ route('kategori_alat') }}" class="svg-icon">
                                        <i class="fa-solid fa-boxes-stacked"></i>
                                        <span class="">Kategori</span>
                                    </a>
                                </li>
                                <li class="@if (request()->routeIs('alat')) active @endif sidebar-layout">
                                    <a href="{{ route('alat') }}" class="svg-icon">
                                        <i class="fa-solid fa-box"></i>
                                        <span class="">Alat/Barang</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="px-3 pt-3 pb-2">
                            <span class="text-uppercase small font-weight-bold">MANAGEMEN ALAT</span>
                        </li>
                        <li class="@if (request()->routeIs('peminjaman_alat')) active @endif sidebar-layout">
                            <a href="{{ route('peminjaman_alat') }}" class="svg-icon">
                                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                <span class="ml-2">Data Peminjaman</span>
                            </a>
                        </li>
                        <li class="@if (request()->routeIs('getReport')) active @endif sidebar-layout">
                            <a href="{{ route('getReport') }}" class="svg-icon">
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                <span class="ml-2">Laporan Peminjaman</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="pt-5 pb-5"></div>
            </div>
        </div>
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="side-menu-bt-sidebar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary wrapper-menu" width="30"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </div>
                    <div class="d-flex align-items-center">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-label="Toggle navigation">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary" width="30"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                <li class="nav-item nav-icon search-content">
                                    <a href="#" class="search-toggle rounded" id="dropdownSearch"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg class="svg-icon text-secondary" id="h-suns" height="25"
                                            width="25" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </a>
                                </li>
                                <li class="nav-item nav-icon dropdown">
                                    <a href="#" class="nav-item nav-icon dropdown-toggle pr-0 search-toggle"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <img src="https://th.bing.com/th/id/R.dfead413848e4732e81b168ba7b2af2c?rik=v4uy50%2fFLOdlJA&riu=http%3a%2f%2ficons.iconarchive.com%2ficons%2fpapirus-team%2fpapirus-status%2f512%2favatar-default-icon.png&ehk=vH3zWw2D75gNFpln4xYYOJHAjAEaM9ZRQRzIN4%2f5WGU%3d&risl=&pid=ImgRaw&r=0"
                                            class="img-fluid avatar-rounded" alt="user">
                                        <span class="mb-0 ml-2 user-name">{{ Auth::user()->name }}</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="dropdownMenuButton">
                                        <li class="dropdown-item  d-flex svg-icon border-top">
                                            <a href="{{ route('password.confirm') }}" class="nav-link"><i
                                                    class="fa-solid fa-gear"></i> Setting </a>
                                        </li>
                                        <li class="dropdown-item  d-flex svg-icon border-top">
                                            <a href="#"
                                                onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"
                                                class="nav-link"><i class="fa-solid fa-right-from-bracket"></i>
                                                Logout</a>
                                        </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                </li>
                            </ul>
                            </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mb-4 mt-1">
                        @yield('content')
                    </div>
                </div>
                <!-- Page end  -->
            </div>
        </div>
    </div>
    <!-- Wrapper End-->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <span class="mr-1">
                        Copyright
                        <script>
                            document.write(new Date().getFullYear())
                        </script>© <a href="#" class="">Nur Nisrina</a>
                        All Rights Reserved.
                    </span>
                </div>
            </div>
        </div>
    </footer> <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('js/backend-bundle.min.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('js/customizer.js') }}"></script>

    <script src="{{ asset('js/sidebar.js') }}"></script>

    <!-- Flextree Javascript-->
    <script src="{{ asset('js/flex-tree.min.js') }}"></script>
    <script src="{{ asset('js/tree.js') }}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('js/table-treeview.js') }}"></script>

    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('js/sweetalert.js') }}"></script>

    <!-- Vectoe Map JavaScript -->
    <script src="{{ asset('js/vector-map-custom.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('js/chart-custom.js') }}"></script>
    <script src="{{ asset('js/charts/01.js') }}"></script>
    <script src="{{ asset('js/charts/02.js') }}"></script>

    <!-- slider JavaScript -->
    <script src="{{ asset('js/slider.js') }}"></script>

    <!-- Emoji picker -->
    <script src="{{ asset('vendor/emoji-picker-element/index.js') }}" type="module"></script>


    <!-- app JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- Main js --}}
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
