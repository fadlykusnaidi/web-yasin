<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            margin: 120px 50px;
        }

        #header {
            position: fixed;
            top: -120px;
            left: 0;
            right: 0;
            height: 150px;
            text-align: center;
        }

        #footer {
            position: fixed;
            left: 0px;
            bottom: -180px;
            right: 0px;
            height: 150px;
            background-color: lightblue;
        }

        #footer .page:after {
            content: counter(page, upper-roman);
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .card {
            width: 70%;
            border: none;
            border-radius: 5px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            max-width: calc(100% - 100px); /* Ensures table width respects page margin */
            margin: 0 auto;
            box-sizing: border-box;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        /* .card-body {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            width: 90%;
            box-sizing: border-box;
        } */

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 1em;
            text-align: left;
            background-color: #ffffff;
            box-sizing: border-box;
        }

        .table-bordered th, .table-bordered td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        .table-header th {
            background-color: #f2f2f2;
            text-align: center;
            color: #333;
        }

        .table tbody .table-row {
            border-bottom: 1px solid #ddd;
        }

        .table tbody .table-row:nth-of-type(even) {
            background-color: #f9f9f9;
        }

        .table tbody .table-row:hover {
            background-color: #f1f1f1;
        }

        .text-center {
            text-align: center;
        }

        .table-header {
            background-color: #009879;
            color: white;
        }

        .table-obat {
            margin-top: 20px;
        }

        .table-obat ul {
            padding-left: 20px;
            margin: 0;
        }

        .table-obat li {
            list-style-type: disc;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div id="header">
        <img src="{{ public_path('images/kopp.png') }}" alt="Header Image">
    </div>

    <div class="card" id="data-pasien">
        <table>
            <tr>
                <th>No. Rekam Medis</th>
                <td>: {{ $noRm['nomor_rm'] }}</td>
            </tr>
            <tr>
                <th>Nama Pasien</th>
                <td>: {{$pasien['Nama']}} </td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>: {{ \Carbon\Carbon::parse($pasien['Tanggal_lahir'])->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>: {{ $pasien['Alamat'] }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>: {{ $pasien['jk'] }}</td>
            </tr>
            <tr>
                <th>Nomor Hp</th>
                <td>: {{ $pasien['No_Hp'] }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>: {{ $pasien['Bpjs'] }}</td>
            </tr>
        </table>
    </div>

    <h1 class ="h3 mb-2 text-gray-800"> Data Rekam Medis</h1>

    <div class="card-body">
        <div class="table">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="table-header">
                    <tr class="text-center">
                        <th class="table-cell">No</th>
                        <th class="table-cell">Tanggal Kunjungan</th>
                        <th class="table-cell">Keluhan</th>
                        <th class="table-cell">Nama Dokter</th>
                        <th class="table-cell">Obat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($rm as $row)
                        <tr class="text-center table-row">
                            <td class="table-cell">{{ $no++ }}</td>
                            <td class="table-cell">{{ \Carbon\Carbon::parse($row->Tanggal_lahir)->format('d-m-Y') }}</td>
                            <td class="table-cell">{{ $row->Keluhan }}</td>
                            <td class="table-cell">{{ $dokterr[$row->id_dokter] }}</td>
                            <td class="table-cell">
                                <ul>
                                    @for ($i = 0; $i < count($obat); $i++)
                                        @if ($obat[$i]['id_rm'] == $row->id)
                                            <li>{{ $obat[$i]['obat']['Nama'] }} - {{ $obat[$i]['keterangan'] }}</li>
                                        @endif
                                    @endfor
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>
