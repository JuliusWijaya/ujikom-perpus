@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                @if (Session::has('message'))
                    <div class="col">
                        <x-alert />
                    </div>
                @endif

                <div class="px-3 py-3">
                    <div class="d-flex  justify-content-between">
                        <h5>{{ __('Daftar Anggota') }}</h5>
                        <a href="{{ route('anggotas.create') }}" class="btn btn-sm btn-primary">
                            Tambah Data
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">JK</th>
                                    <th scope="col">TP Lahir</th>
                                    <th scope="col">TG Lahir</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No Hp</th>
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
                                        <td>{{ $row->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                        <td>{{ $row->tp_lahir }}</td>
                                        <td>{{ \Carbon\Carbon::parse($row->tg_lahir)->format('d-m-Y') }}</td>
                                        <td>{{ $row->alamat }}</td>
                                        <td>{{ $row->no_hp }}</td>
                                        <td>{{ Str::ucfirst($row->jns_anggota) }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $row->status != 'active' ? 'badge-danger' : 'badge-success' }}">
                                                {{ Str::ucfirst($row->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-info" type="button" data-toggle="collapse"
                                                data-target="#collapseExample{{ $row->id }}" aria-expanded="false"
                                                aria-controls="collapseExample">
                                                <i class="fa fa-arrow-alt-circle-down"></i>
                                            </button>

                                            <div class="collapse" id="collapseExample{{ $row->id }}">
                                                <a href="{{ route('anggotas.edit', $row->id) }}"
                                                    class="btn btn-sm btn-success my-2">
                                                    <i class="fa fa-pen"></i>
                                                </a>
                                                <form action="{{ route('anggotas.destroy', $row->id) }}" method="POST"
                                                    onsubmit="return confirm('Do you really want to delete {{ $row->name }}?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
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
