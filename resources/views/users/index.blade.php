@extends('layouts.main')

@section('content')
    <div class="row justify-content-center my-3">
        <div class="col-md-10 col-lg-12">
            <div class="card">
                @if (Session::has('message'))
                    <div class="col">
                        <x-alert />
                    </div>
                @endif

                <div class="px-3 py-3">
                    <div class="d-flex  justify-content-between">
                        <h5>{{ __('Daftar pengguna') }}</h5>
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
                            Tambah Data
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Hak Akses</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($users as $row)
                                    @php
                                        $no++;
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $no }}</th>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ Str::ucfirst($row->hak_akses) }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $row->status != 'active' ? 'text-bg-danger' : 'text-bg-primary' }}">
                                                {{ Str::ucfirst($row->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('users.edit', $row->id) }}"
                                                class="btn btn-sm btn-success me-2">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <form action="{{ route('users.destroy', $row->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Do you really want to delete {{ $row->name }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger mx-2">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
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
