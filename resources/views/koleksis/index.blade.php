@extends('layouts.main')

@section('content')
    <div class="row justify-content-center my-3">
        <div class="col-sm-12 col-md-9 col-lg-8">
            <div class="card">
                @if (Session::has('message'))
                    <div class="col">
                        <x-alert />
                    </div>
                @endif

                <div class="card-header">
                    <h5>{{ __('Koleksi Buku') }}</h5>
                </div>

                <div class="card-body">
                    <a href="{{ route('koleksis.create') }}" class="btn btn-sm btn-primary mb-3">
                        Tambah Koleksi
                    </a>
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Judul</th>
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
                                        <td>{{ $row->status }}</td>
                                        <td>
                                            <a href="{{ route('koleksis.edit', $row->id) }}"
                                                class="btn btn-sm btn-success me-2">
                                                Edit
                                            </a>
                                            <form action="{{ route('koleksis.destroy', $row->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Do you really want to delete {{ $row->judul }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <span>
                                                        Delete
                                                    </span>
                                                </button>
                                            </form>
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
@endsection
