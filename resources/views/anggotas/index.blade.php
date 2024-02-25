@extends('layouts.main')

@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="card">
                @if (Session::has('message'))
                    <div class="col">
                        <x-alert />
                    </div>
                @endif

                <div class="card-header">
                    <h5>{{ __('Daftar Anggota') }}</h5>
                </div>

                <div class="card-body">
                    <a href="{{ route('anggotas.create') }}" class="btn btn-sm btn-primary">
                        Tambah Anggota
                    </a>
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($anggotas as $row)
                                @php
                                    $no++;
                                @endphp
                                <tr>
                                    <th scope="row">{{ $no }}</th>
                                    <td>{{ $row->kd_anggota }}</td>
                                    <td>{{ $row->nm_anggota }}</td>
                                    <td>{{ Str::ucfirst($row->jns_anggota) }}</td>
                                    <td>
                                        <span
                                            class="badge {{ $row->status != 'active' ? 'text-bg-danger' : 'text-bg-primary' }}">
                                            {{ Str::ucfirst($row->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('anggotas.edit', $row->id) }}"
                                            class="btn btn-sm btn-success me-2">
                                            Edit
                                        </a>
                                        <form action="{{ route('anggotas.destroy', $row->id) }}" method="POST"
                                            class="d-inline"
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
@endsection
