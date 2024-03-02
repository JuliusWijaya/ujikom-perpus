@extends('layouts.main')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="px-3 py-3">
                    <div class="d-flex justify-content-between">
                        <h5 class="text-center mb-3">Laporan</h5>

                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('laporans.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3">
                                    <input type="date" id="tg_awal" class="form-control" name="tg_awal"
                                        placeholder="Tanggal Awal">
                                </div>
                                <div class="mb-3">
                                    <input type="date" id="tg_akhir" class="form-control" name="tg_akhir"
                                        placeholder="Tanggal Awal">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Filter</button>
                                </div>
                            </div>
                        </div>

                    </form>
                    {{-- <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Transaksi</th>
                                    <th>Nama Anggota</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Judul</th>
                                    <th>Denda</th>
                                    <th>Pengguna</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($data)
                                    <?php $no = 0; ?>
                                    @foreach ($data as $row)
                                        <?php $no++; ?>
                                        <tr>
                                            <th scope="row">{{ $no }}</th>
                                            <td>{{ $row->no_transaksi_kembali }}</td>
                                            <td>{{ $row->no_transaksi_pinjam }}</td>
                                            <td>{{ $row->anggota->nm_anggota }}</td>
                                            <td>{{ $row->tg_pinjam }}</td>
                                            <td>{{ $row->tg_kembali }}</td>
                                            <td>{{ $row->judul }}</td>
                                            <td>{{ $row->denda }}</td>
                                            <td>{{ $row->pengguna->nm_pengguna }}</td>
                                            <td>
                                                <a href="#" class="btn btn-info">
                                                    Pdf
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9" class="text-center text-danger">No Data</th>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
