<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>HALAMAN LOGIN {{ isset($title) ? '| ' . $title : '' }}</title>
    <link href="{{ asset('images/klinik-yasin.png') }}" rel="icon" type="text/css">
    <!-- Custom fonts for this template-->
   
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        body {
            background-image: url("{{ asset('images/klinik1.jpg') }}");
            background-size: cover;
        }

        .coba {
            background-color: rgb(255, 255, 255, 0.6) !important;
        }

        .hijau {
            color: rgb(29, 110, 29)
        }
    </style>
</head>

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5 coba">
                    <div class="card-body p-0 ">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-lg-block text-center"><img class="mt-5"
                                    src="{{ asset('images/klinik-yasin.png') }}" width="200"alt=""><br><br>
                                <h3 class="hijau"><strong>WEBSITE PELAYANAN KLINIK PRATAMA YASIN</strong></h3>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        @if (session('error'))
                                            <div class="text-danger text-center">{{ session('error') }}</div>
                                        @endif
                                        @if (session('success'))
                                            <div class="text-success text-center">{{ session('success') }}</div>
                                        @endif
                                        <p class="login-box-msg hijau"><strong>SIGN IN</strong></p>
                                    </div>
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="mb-3 email-text">
                                            <label for="username" class="form-label hijau">Username</label>
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror"
                                                name="username" value="{{ old('username') }}" required
                                                autocomplete="username" autofocus>
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ __('Username atau Password anda salah') }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 password-text">
                                            <label for="password" class="form-label hijau">{{ 'Password' }}</label>
                                            <div class="col-md-15">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-info" style="width: 188px;">Sign
                                                In</button>
                                        </div>
                                    </form>
                                    <hr>

                                </div>
                            </div>
                        </div>
                    </div>
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
    <script src="{{ asset('template/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('template/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('template/js/demo/chart-pie-demo.js') }}"></script>
</body>

</html>
