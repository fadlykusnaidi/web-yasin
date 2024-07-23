<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('images/klinik-yasin.png') }}" rel="icon" type="text/css">
    <title>@yield('title')</title>
    <style>
        .bg-c-green {
            background: linear-gradient(45deg, #2eafb6, #2e88b6);
        }
    </style>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav card bg-c-green order-card sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon ">
                    <img src="{{ asset('images/klinik-yasin.png') }}" width="60">
                </div>
                <div class="sidebar-brand-text mx-2 font-weight-bold">
                    <h6>KLINIK</h6> PRATAMA YASIN
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a type="button" class="nav-link {{ request()->is('/') ? 'fw-bolder text-white' : '' }}"
                    href="/">
                    <i class="fas fa-fw fa-home {{ request()->is('/') ? 'fw-bolder text-white' : '' }}"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @if ($user->status == 'admin')
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pasien') ? 'fw-bolder text-white' : '' }}"
                        href="{{ route('pasien') }}">
                        <i class="fas fa-fw fa-users {{ request()->is('pasien') ? 'fw-bolder text-white' : '' }}"></i>
                        <span>Pasien</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dokter.index') ? 'fw-bolder text-white' : '' }}"
                        href="{{ route('dokter.index') }}">
                        <i class="fa fa-user-md {{ request()->routeIs('dokter.index') ? 'fw-bolder text-white' : '' }}"></i>
                        <span>Dokter</span>
                    </a>
                </li>
                @endif
                @if ($user->status == 'admin'|| $user->status == 'apoteker')
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('obat.index') ? 'fw-bolder text-white' : '' }}"
                        href="{{ route('obat.index') }}">
                        <i class="fa fa-pills {{ request()->is('obat.index') ? 'fw-bolder text-white' : '' }}"></i>
                        <span>Obat</span>
                    </a>
                </li>
                @endif
            @if ($user->status == 'admin' || $user->status == 'dokter')
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('rekammedis') ? 'fw-bolder text-white' : '' }}"
                        href="{{ route('rekammedis') }}">
                        <i class="fa fa-medkit {{ request()->is('rekammedis') ? 'fw-bolder text-white' : '' }}"></i>
                        <span>Rekam Medis</span>
                    </a>
                </li>
            @endif
            @if ($user->status == 'apoteker')
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('resepobat') ? 'fw-bolder text-white' : '' }}"
                        href="{{ route('resepobat.index') }}">
                        <i class="fa fa-medkit {{ request()->is('resepobat') ? 'fw-bolder text-white' : '' }}"></i>
                        <span>Resep Obat</span>
                    </a>
                </li>
            @endif
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website Klinik Pratama Yasin</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda Ingin Keluar dari web ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">Klik Logout jika ingin keluar dari web ini dan klik cancel jika batal keluar
                    dari web ini</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <a class="btn btn-info" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script>

</body>

</html>
