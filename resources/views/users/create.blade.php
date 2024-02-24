@extends('layouts.main')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h5 class="text-center">{{ __('Tambah pengguna') }}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="form-group row mt-3">
                                    <label for="name" class="form-label">Name</label>
                                    <div class="col">
                                        <input type="text" id="name" class="form-control" name="name" required
                                            autofocus>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="email_address" class="form-label">E-Mail
                                        Address</label>
                                    <div class="col">
                                        <input type="text" id="email_address" class="form-control" name="email"
                                            required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="col">
                                        <input type="password" id="password" class="form-control" name="password">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="hak_akses" class="form-label">Hak Akses</label>
                                    <div class="col">
                                        <select class="form-select" id="hak_akses" name="hak_akses" aria-label="hak_akses">
                                            <option selected>Choose</option>
                                            <option value="admin" @selected(old('hak_akses'))>Admin</option>
                                            <option value="anggota" @selected(old('hak_akses'))>Anggota</option>
                                        </select>
                                        @if ($errors->has('hak_akses'))
                                            <span class="text-danger">{{ $errors->first('hak_akses') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col mt-3 p-2">
                                    <button type="submit" class="btn btn-primary form-control">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
