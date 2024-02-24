@extends('layouts.main')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-5">
                    <div class="card">
                        <div class="card-header">Edit User</div>

                        <div class="card-body">
                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mt-3">
                                    <label for="name" class="form-label">Name</label>
                                    <div class="col">
                                        <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                                        <input type="text" id="name" class="form-control" name="name" required
                                            autofocus value="{{ $user->name }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="email_address" class="form-label">
                                        E-Mail
                                    </label>
                                    <div class="col">
                                        <input type="text" id="email_address" class="form-control" name="email"
                                            required value="{{ $user->email }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="col">
                                        <input type="password" id="password" class="form-control" name="password"
                                            value="{{ $user->password }}">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="hak_akses" class="form-label">Role</label>
                                    <div class="col">
                                        <select class="form-select" id="hak_akses" name="hak_akses" aria-label="hak_akses">
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
        </div>
    </main>
@endsection
