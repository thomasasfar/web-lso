<!DOCTYPE html>
<html>

<head>
    <title>Tabel Klien dan Standard</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 4px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Daftar Klien LSO Sumatera Barat</h2>
        <table class="table table-striped">
            @foreach ($clients as $client)
                <thead>
                    <th scope="col" style="width: 3%">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Pemilik</th>
                    <th scope="col">Ruang Lingkup</th>
                    <th scope="col">Standard</th>
                    <th scope="col">No Sertifikat</th>
                    <th scope="col">Tanggal Mulai Berlaku</th>
                    <th scope="col">Tanggal Berakhir</th>
                    <th scope="col">Status</th>
                </thead>
                <tbody>
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $client->nama }}</th>
                        <th>{{ $client->kontak }}</th>
                        <th>{{ optional($client->DetailRuangLingkup)->pluck('ruangLingkup.nama')->implode(', ') }}</th>
                        <th>
                            {{ optional($client->DetailStandard)->pluck('standard.nama_standar')->implode(', ') }}
                        </th>
                        <th>{{ $client->nomor_sertifikat }}</th>
                        <th>{{ date('d-m-Y', strtotime($client->tanggal_mulai_berlaku)) }}</th>
                        <th>{{ date('d-m-Y', strtotime($client->tanggal_habis_berlaku)) }}</th>
                        <th>{{ $client->Status->nama }}</th>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</body>

</html>
