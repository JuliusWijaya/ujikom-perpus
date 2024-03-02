@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                @if (Session::has('message'))
                    <div class="col">
                        <x-alert />
                    </div>
                @endif
                <div class="px-3 py-3">
                    <div class="d-flex justify-content-between">
                        <h5>{{ __('Transaksi Kembali') }}</h5>
                        <a href="{{ route('kembalis.create') }}" class="btn btn-primary">Tambah Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>TRS Pinjam</th>
                                    <th>TRS Kembali</th>
                                    <th>Anggota</th>
                                    <th>Tgl Pinjam</th>
                                    <th>Tgl Kembali</th>
                                    <th>Kd Koleksi</th>
                                    <th>Judul</th>
                                    <th>Pustaka</th>
                                    <th>Koleksi</th>
                                    <th>Media</th>
                                    <th>Denda</th>
                                    <th>Ket</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kembalis as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->no_transaksi_pinjam }}</td>
                                        <td>{{ $row->no_transaksi_kembali }}</td>
                                        <td>{{ $row->anggota->nm_anggota }}</td>
                                        <td>{{ \Carbon\Carbon::parse($row->tg_pinjam)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($row->tg_kembali)->format('d-m-Y') }}</td>
                                        <td>{{ $row->kd_koleksi }}</td>
                                        <td>{{ $row->judul }}</td>
                                        <td>{{ $row->jns_bhn_pustaka }}</td>
                                        <td>{{ Str::ucfirst($row->jns_koleksi) }}</td>
                                        <td>{{ Str::ucfirst($row->jns_media) }}</td>
                                        <td>{{ $row->denda }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $row->ket == 'belum' ? 'badge-danger' : 'badge-success' }}">
                                                {{ Str::ucfirst($row->ket) }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-info" type="button" data-toggle="collapse"
                                                data-target="#collapseExample{{ $row->id }}" aria-expanded="false"
                                                aria-controls="collapseExample">
                                                <i class="fa fa-arrow-alt-circle-down"></i>
                                            </button>

                                            <div class="collapse" id="collapseExample{{ $row->id }}">
                                                <a href="{{ route('kembalis.edit', $row->id) }}"
                                                    class="btn btn-success my-2">
                                                    <i class="fa fa-pen"></i>
                                                </a>
                                                <form action="{{ route('kembalis.destroy', $row->id) }}" method="POST">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
