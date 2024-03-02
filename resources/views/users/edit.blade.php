@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5">
            <div class="card">
                <div class="px-3 py-3">
                    <div class="d-flex justify-content-between">
                        <h5>{{ __('Edit Data') }}</h5>
                        <a href="{{ route('users.index') }}" class="link">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                            <input type="text" id="name" class="form-control" name="name" required autofocus
                                value="{{ $user->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="email_address" class="form-label">
                                E-Mail
                            </label>
                            <input type="text" id="email_address" class="form-control" name="email" required
                                value="{{ $user->email }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password"
                                value="{{ $user->password }}">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="hak_akses" class="form-label">Role</label>
                            <select class="form-control" id="hak_akses" name="hak_akses" aria-label="hak_akses">
                                <option value="">Choose</option>
                                <option value="admin"
                                    {{ old('hak_akses', $user->hak_akses == 'admin') ? 'selected' : '' }}>
                                    Admin
                                </option>
                                <option value="anggota"
                                    {{ old('hak_akses', $user->hak_akses == 'anggota') ? 'selected' : '' }}>
                                    Anggota
                                </option>
                            </select>
                            @if ($errors->has('hak_akses'))
                                <span class="text-danger">{{ $errors->first('hak_akses') }}</span>
                            @endif
                        </div>

                        <div class="mt-3 p-2">
                            <button type="submit" class="btn btn-primary form-control">
                                Simpan perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
