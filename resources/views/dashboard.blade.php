@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
    <style>
        .order-card {
            color: #fff;
        }

        .bg-c-blue {
            background: linear-gradient(45deg, #f534ff, #d534ff);
        }

        .bg-c-green {
            background: linear-gradient(45deg, #2eafb6, #2e88b6);
        }

        .bg-c-yellow {
            background: linear-gradient(45deg, #FFB64D, #ffcb80);
        }

        .bg-c-pink {
            background: linear-gradient(45deg, #FF5370, #ff869a);
        }


        .bg-c-greenn {
            background: linear-gradient(45deg, #107767, #105567);
        }


        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            border: none;
            margin-bottom: 30px;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .card .card-block {
            padding: 25px;
        }

        .order-card i {
            font-size: 26px;
        }

        .f-left {
            float: left;
        }

        .f-right {
            float: right;
        }

        td {
            font-size: 11px;
        }

        th {
            font-size: 12px;
        }
    </style>
    <div class="card bg-c-green order-card">
        <div class="d-flex flex-column align-items-start mb-1">
            <h1 class="text-white ms-2 font-weight-bold">Halo {{ $user->name }}</h1>
            <h4 class="text-white ms-2 font-italic">Selamat Datang Di Halaman Dashboard</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
            <div class="container">
                <div class="row">
                    <div class="d-flex justify-content-center">
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-c-blue order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Jumlah Pasien </h6>
                                    <h2 class="text-right"><i
                                            class="fas fa-fw fa-users f-left"></i><span>{{ $pasien }}</span></h2>
                                    <!-- <p class="m-b-0">Completed Orders<span class="f-right">351</span></p> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-c-green order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Pasien Laki-laki </h6>
                                    <h2 class="text-right"><i class="fa fa-mars f-left"></i><span>{{ $laki }}</span>
                                    </h2>
                                    <!-- <p class="m-b-0">Completed Orders<span class="f-right">351</span></p> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xl-3">
                            <div class="card bg-c-greenn order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Pasien Perempuan</h6>
                                    <h2 class="text-right"><i
                                            class="fa fa-venus f-left"></i><span>{{ $perempuan }}</span></h2>
                                    <!-- <p class="m-b-0">Completed Orders<span class="f-right">351</span></p> -->
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 col-xl-3">
                            <div class="card bg-c-yellow order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Jumlah Dokter</h6>
                                    <h2 class="text-right"><i
                                            class="fa  fa-user-md f-left"></i><span>{{ $dokter }}</span></h2>
                                    <!-- <p class="m-b-0">Completed Orders<span class="f-right">351</span></p> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <div class="col-md-4 col-xl-3">
                            <div class="card bg-c-pink order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Jumlah Obat</h6>
                                    <h2 class="text-right"><i
                                            class="fa solid fa-pills f-left"></i><span>{{ $obat }}</span></h2>
                                    <!-- <p class="m-b-0">Completed Orders<span class="f-right">351</span></p> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xl-3">
                            <div class="card bg-c-pink order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Jumlah Kunjungan</h6>
                                    <h2 class="text-right"><i
                                            class="fa fa-stethoscope f-left"></i><span>{{ $rekamMedis }}</span></h2>
                                    <!-- <p class="m-b-0">Completed Orders<span class="f-right">351</span></p> -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
