@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-lg-5 offset-lg-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Daftar</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register.post') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autofocus>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="d-block">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        data-indicator="pwindicator" name="password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="hak_akses" class="d-block">Hak Akses</label>
                                    <select name="hak_akses" id="hak_akses"
                                        class="form-control selectric @error('hak_akses') is-invalid @enderror">
                                        <option value="">-- Pilih Hak Akses --</option>
                                        <option value="admin" @selected(old('hak_akses') == 'admin')>Administrator</option>
                                        <option value="anggota" @selected(old('hak_akses') == 'anggota')>Anggota</option>
                                    </select>
                                    @error('hak_akses')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Daftar
                                    </button>
                                </div>
                            </form>

                            <div class="mt-3 text-muted text-center">
                                Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
