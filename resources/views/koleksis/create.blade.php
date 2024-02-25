@extends('layouts.main')

@section('content')
    <div class="row justify-content-center my-3">
        <div class="col-12 col-md-9 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>{{ __('Tambah Koleksi') }}</h5>
                        <a href="{{ route('adm.koleksis.index') }}" class="link">Kembali</a>
                    </div>
                </div>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
