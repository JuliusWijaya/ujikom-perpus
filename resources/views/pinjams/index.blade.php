@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if (Session::has('message'))
                    <div class="col">
                        <x-alert />
                    </div>
                @endif

                <div class="py-3 px-4">
                    <div class="d-flex justify-content-between ">
                        <h5>{{ __('Peminjaman') }}</h5>

                        <a href="{{ route('pinjams.create') }}" class="btn btn-primary">
                            {{ __('Tambah Data') }}
                        </a>
                    </div>
                </div>

                <div class="card-body overflow-auto">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>TRS Pinjam</th>
                                    <th>Nama Anggota</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Kode Koleksi</th>
                                    <th>Judul</th>
                                    <th>Bahan Pustaka</th>
                                    <th>Koleksi</th>
                                    <th>Media</th>
                                    <th>Pengguna</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($pinjams->count())
                                    @foreach ($pinjams as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->no_transaksi_pinjam }}</td>
                                            <td>{{ $item->pengguna->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tg_pinjam)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tg_bts_kembali)->format('d-m-Y') }}</td>
                                            <td>{{ $item->kd_koleksi }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->jns_bhn_pustaka }}</td>
                                            <td>{{ $item->jns_koleksi }}</td>
                                            <td>{{ Str::ucfirst($item->jns_media) }}</td>
                                            <td>{{ $item->pengguna->name }}</td>
                                            <td>
                                                <button class="btn btn-info" type="button" data-toggle="collapse"
                                                    data-target="#collapseExample{{ $item->id }}" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <i class="fa fa-arrow-alt-circle-down"></i>
                                                </button>

                                                <div class="collapse" id="collapseExample{{ $item->id }}">
                                                    <a href="{{ route('pinjams.edit', $item->id) }}"
                                                        class="btn btn-success my-2">
                                                        <i class="fa fa-pen"></i>
                                                    </a>
                                                    <form action="{{ route('pinjams.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit"
                                                            onclick="return confirm('Are you sure?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="11">
                                            <div class="text-warning text-center fs-3 fw-bold">Data not found!</div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
