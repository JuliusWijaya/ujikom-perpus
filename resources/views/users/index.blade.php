@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @if (Session::has('message'))
                        <div class="alert {{ Session::get('alert-class') }} alert-dismissible fade show" role="alert">
                            {{ Session::get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card-header">
                        <h5>{{ __('Daftar pengguna') }}</h5>
                    </div>

                    <div class="card-body">
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
                            Tambah User
                        </a>
                        <table class="table">
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
                                        <td>{{ $row->hak_akses }}</td>
                                        <td>
                                            <span class="badge text-bg-primary">
                                                {{ $row->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('users.edit', $row->id) }}"
                                                class="btn btn-sm btn-success me-2">
                                                Edit
                                            </a>
                                            <form action="{{ route('users.destroy', $row->id) }}" method="POST"
                                                style="display: inline"
                                                onsubmit="return confirm('Do you really want to delete {{ $row->name }}?');">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
