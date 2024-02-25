@extends('layouts.main')

@section('content')
    <main class="login-form">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="fw-bold">{{ __('Daftar akun') }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register.post') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="form-label">Name</label>
                                <div class="col">
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="email_address" class="form-label">
                                    Email
                                </label>
                                <div class="col">
                                    <input type="email" id="email_address" class="form-control" name="email"
                                        value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="col">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="hak_akses" class="form-label">Hak Akses</label>
                                <div class="col">
                                    <select class="form-select" id="hak_akses" name="hak_akses" aria-label="hak_akses">
                                        <option>-- Pilih --</option>
                                        <option value="admin" @selected(old('hak_akses'))>Admin</option>
                                        <option value="anggota" @selected(old('hak_akses'))>Anggota</option>
                                    </select>
                                    @if ($errors->has('hak_akses'))
                                        <span class="text-danger">{{ $errors->first('hak_akses') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col mt-3 p-2">
                                <button type="submit" class="btn btn-primary form-control fw-semibold">
                                    {{ __('Daftar') }}
                                </button>
                            </div>
                        </form>
                        <div class="my-2 text-center">
                            <span>
                                {{ __('Sudah punya akun?') }}
                                <a href="{{ route('login') }}" class="fw-semibold text-decoration-none">
                                    {{ __('Masuk') }}
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
