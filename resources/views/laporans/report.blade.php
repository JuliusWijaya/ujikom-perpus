<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <h5 class="text-center">{{ __('Laporan') }}</h5>
    <hr>
    {{-- <div class="d-flex flex-column">
        @foreach ($data as $row)
            <p>
                No Transaksi Pinjam :
                <span>{{ $row['no_transaksi_pinjam'] }}</span>
            </p>
            <p>
                No Transaksi Kembali :
                <span>
                    {{ $row['no_transaksi_kembali'] }}
                </span>
            </p>
            <p>
                Pengguna :
                <span>
                    {{ $row['pengguna']['name'] }}
                </span>
            </p>
        @endforeach
    </div> --}}

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tgl Pinjam</th>
                <th scope="col">Tgl Kembali</th>
                <th scope="col">Nm Anggota</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Denda</th>
            </tr>
        </thead>
        <tbody>
            @if ($data)
                <?php $no = 0; ?>
                @foreach ($data as $row)
                    <?php $no++; ?>
                    <tr>
                        <th scope="row">{{ $no }}</th>
                        <td>{{ \Carbon\Carbon::parse($row['tg_pinjam'])->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($row['tg_kembali'])->format('d/m/Y') }}</td>
                        <td>{{ $row['anggota']['nm_anggota'] }}</td>
                        <td>{{ $row['judul'] }}</td>
                        <td>{{ $row['denda'] }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" class="text-center">
                        No Data
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>
