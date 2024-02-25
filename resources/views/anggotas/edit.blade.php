@extends('layouts.main')

@section('content')
    <div class="row justify-content-center my-3">
        <div class="col col-md-10 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>{{ __('Tambah Anggota') }}</h5>
                        <a href="{{ route('anggotas.index') }}" class="link">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('anggotas.update', $anggota->id) }}" method="POST" class="row g-3">
                        @csrf
                        @method('PUT')
                        <div class="col-md-4">
                            <label for="kd_anggota" class="form-label">Kode Anggota</label>
                            <input class="form-control @error('kd_anggota') is-invalid @enderror" type="text"
                                id="kd_anggota" name="kd_anggota" autofocus autocomplete="off" required
                                value="{{ old('kd_anggota', $anggota->kd_anggota) }}">
                            @if ($errors->has('kd_anggota'))
                                <span class="text-danger">{{ $errors->first('kd_anggota') }}</span>
                            @endif
                        </div>

                        <div class="col-md-8">
                            <label for="nm_anggota" class="form-label">Nama Lengkap</label>
                            <input class="form-control @error('nm_anggota') is-invalid @enderror" type="text"
                                id="nm_anggota" name="nm_anggota" autocomplete="off" required
                                value="{{ old('nm_anggota', $anggota->nm_anggota) }}">
                            @if ($errors->has('nm_anggota'))
                                <span class="text-danger">{{ $errors->first('nm_anggota') }}</span>
                            @endif
                        </div>

                        <div class="col-4">
                            <label for="jk" class="form-label">Jenis Kelamin</label>
                            <select id="jk" name="jk" class="form-select @error('jk') is-invalid @enderror"
                                required>
                                <option selected>-- Pilih JK --</option>
                                <option value="L" @selected(old('jk', $anggota->jk) == 'L')>Laki-laki</option>
                                <option value="P" @selected(old('jk', $anggota->jk) == 'P')>Perempuan</option>
                            </select>
                            @if ($errors->has('jk'))
                                <span class="text-danger">{{ $errors->first('jk') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <label for="tg_lahir" class="form-label">Tanggal Lahir</label>
                            <input class="form-control @error('tg_lahir') is-invalid @enderror" type="date"
                                id="tg_lahir" name="tg_lahir" value="{{ old('tg_lahir', $anggota->tg_lahir) }}">
                            @if ($errors->has('tg_lahir'))
                                <span class="text-danger">{{ $errors->first('tg_lahir') }}</span>
                            @endif
                        </div>

                        <div class="col-md-5">
                            <label for="tp_lahir" class="form-label">Tempat Lahir</label>
                            <input class="form-control @error('tp_lahir') is-invalid @enderror" type="text"
                                id="tp_lahir" name="tp_lahir" value="{{ old('tp_lahir', $anggota->tp_lahir) }}">
                            @if ($errors->has('tp_lahir'))
                                <span class="text-danger">{{ $errors->first('tp_lahir') }}</span>
                            @endif
                        </div>

                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="Masukan alamat lengkap" value="{{ old('alamat', $anggota->alamat) }}">
                            @if ($errors->has('alamat'))
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <label for="no_hp" class="form-label">No HP</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp"
                                value="{{ old('no_hp', $anggota->no_hp) }}">
                            @if ($errors->has('no_hp'))
                                <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <label for="jns_anggota" class="form-label">Jenis Anggota</label>
                            <select id="jns_anggota" name="jns_anggota"
                                class="form-select @error('jns_anggota') is-invalid @enderror">
                                <option selected>-- Pilih Jenis --</option>
                                <option value="member" @selected(old('jns_anggota', $anggota->jns_anggota) == 'member')>
                                    Member
                                </option>
                                <option value="non member" @selected(old('jns_anggota', $anggota->jns_anggota) == 'non member')>
                                    Non Member
                                </option>
                            </select>
                            @if ($errors->has('jns_anggota'))
                                <span class="text-danger">{{ $errors->first('jns_anggota') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                                <option selected>-- Pilih Status --</option>
                                <option value="active" @selected(old('status', $anggota->status) == 'active')>
                                    Active
                                </option>
                                <option value="inactive" @selected(old('status', $anggota->status) == 'inactive')>
                                    Inactive
                                </option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <label for="jml_pinjam" class="form-label">Jumlah Pinjaman</label>
                            <input type="number" class="form-control" id="jml_pinjam" name="jml_pinjam"
                                value="{{ old('jml_pinjam', $anggota->jml_pinjam) }}">
                            @if ($errors->has('jml_pinjam'))
                                <span class="text-danger">{{ $errors->first('jml_pinjam') }}</span>
                            @endif
                        </div>

                        <div class="my-3">
                            <button type="submit" class="btn btn-primary btn-sm me-2">Simpan</button>
                            <button type="button" class="btn btn-secondary btn-sm">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
