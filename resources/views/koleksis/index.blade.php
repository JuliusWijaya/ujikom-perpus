@extends('layouts.main')

@section('content')
    <div class="row justify-content-center my-3">
        <div class="col-12">
            <div class="card">
                @if (Session::has('message'))
                    <div class="col">
                        <x-alert />
                    </div>
                @endif

                <div class="px-3 py-3">
                    <div class="d-flex justify-content-between">
                        <h5>{{ __('Koleksi Buku') }}</h5>

                        <a href="{{ route('koleksis.create') }}" class="btn btn-sm btn-primary mb-3">
                            Tambah Data
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Judul</th>
                                    <th>Pustaka</th>
                                    <th>Koleksi</th>
                                    <th>Media</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th>Tahun</th>
                                    <th>Cetakan</th>
                                    <th>Edisi</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @if ($koleksis->count())
                                    @foreach ($koleksis as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->kd_koleksi }}</td>
                                            <td>{{ $row->judul }}</td>
                                            <td>{{ $row->jns_bahan_pustaka }}</td>
                                            <td>{{ $row->jns_koleksi }}</td>
                                            <td>{{ Str::ucfirst($row->jns_media) }}</td>
                                            <td>{{ $row->pengarang }}</td>
                                            <td>{{ $row->penerbit }}</td>
                                            <td>{{ $row->tahun }}</td>
                                            <td>{{ $row->cetakan }}</td>
                                            <td>{{ $row->edisi }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $row->status != 'active' ? 'badge-danger' : 'badge-success' }}">
                                                    {{ $row->status }}
                                                </span>
                                            </td>
                                            <td>
                                                <button class="btn btn-info" type="button" data-toggle="collapse"
                                                    data-target="#collapseExample{{ $row->id }}" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <i class="fa fa-arrow-alt-circle-down"></i>
                                                </button>

                                                <div class="collapse" id="collapseExample{{ $row->id }}">
                                                    <a href="{{ route('koleksis.edit', $row->id) }}"
                                                        class="btn btn-sm btn-success my-2">
                                                        <i class="fa fa-pen"></i>
                                                    </a>
                                                    <form action="{{ route('koleksis.destroy', $row->id) }}" method="POST"
                                                        onsubmit="return confirm('Do you really want to delete {{ $row->judul }}?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <span>
                                                                <i class="fa fa-trash"></i>
                                                            </span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">
                                            <div class="alert alert-warning text-center" role="alert">
                                                Data koleksi tidak ditemukan!
                                            </div>
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
