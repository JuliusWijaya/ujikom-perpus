@extends('layouts.main')

@section('content')
    <div class="row justify-content-center my-3">
        <div class="col col-md-10 col-lg-8">
            <div class="card">
                <div class="px-3 py-3">
                    <div class="d-flex justify-content-between">
                        <h5>{{ __('Tambah Data') }}</h5>
                        <a href="{{ route('anggotas.index') }}" class="link">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('anggotas.store') }}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-4 mb-3">
                            <label for="kd_anggota" class="form-label">Kode Anggota</label>
                            <input class="form-control @error('kd_anggota') is-invalid @enderror" type="text"
                                id="kd_anggota" name="kd_anggota" autofocus autocomplete="off" required
                                value="{{ old('kd_anggota') }}">
                            @if ($errors->has('kd_anggota'))
                                <span class="text-danger">{{ $errors->first('kd_anggota') }}</span>
                            @endif
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="nm_anggota" class="form-label">Nama Lengkap</label>
                            <input class="form-control @error('nm_anggota') is-invalid @enderror" type="text"
                                id="nm_anggota" name="nm_anggota" autocomplete="off" required
                                value="{{ old('nm_anggota') }}">
                            @if ($errors->has('nm_anggota'))
                                <span class="text-danger">{{ $errors->first('nm_anggota') }}</span>
                            @endif
                        </div>

                        <div class="col-4 mb-3">
                            <label for="jk" class="form-label">Jenis Kelamin</label>
                            <select id="jk" name="jk" class="form-control @error('jk') is-invalid @enderror"
                                required>
                                <option selected>-- Pilih JK --</option>
                                <option value="L" @selected(old('jk'))>Laki-laki</option>
                                <option value="P" @selected(old('jk'))>Perempuan</option>
                            </select>
                            @if ($errors->has('jk'))
                                <span class="text-danger">{{ $errors->first('jk') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="tg_lahir" class="form-label">Tanggal Lahir</label>
                            <input class="form-control @error('tg_lahir') is-invalid @enderror" type="date"
                                id="tg_lahir" name="tg_lahir" value="{{ old('tg_lahir') }}">
                            @if ($errors->has('tg_lahir'))
                                <span class="text-danger">{{ $errors->first('tg_lahir') }}</span>
                            @endif
                        </div>

                        <div class="col-md-5 mb-3">
                            <label for="tp_lahir" class="form-label">Tempat Lahir</label>
                            <input class="form-control @error('tp_lahir') is-invalid @enderror" type="text"
                                id="tp_lahir" name="tp_lahir" value="{{ old('tp_lahir') }}">
                            @if ($errors->has('tp_lahir'))
                                <span class="text-danger">{{ $errors->first('tp_lahir') }}</span>
                            @endif
                        </div>

                        <div class="col-12 mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="Masukan alamat lengkap" value="{{ old('alamat') }}">
                            @if ($errors->has('alamat'))
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="no_hp" class="form-label">No HP</label>
                            <input type="tel" class="form-control" id="no_hp" name="no_hp"
                                value="{{ old('no_hp') }}" maxlength="13">
                            @if ($errors->has('no_hp'))
                                <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="jns_anggota" class="form-label">Jenis Anggota</label>
                            <select id="jns_anggota" name="jns_anggota"
                                class="form-control @error('jns_anggota') is-invalid @enderror">
                                <option>-- Pilih Jenis --</option>
                                <option value="member" @selected(old('jns_anggota') == 'member')>Member</option>
                                <option value="non member" @selected(old('jns_anggota') == 'non member')>Non Member</option>
                            </select>
                            @if ($errors->has('jns_anggota'))
                                <span class="text-danger">{{ $errors->first('jns_anggota') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status"
                                class="form-control @error('status') is-invalid @enderror">
                                <option selected>-- Pilih Status --</option>
                                <option value="active" @selected(old('status') == 'active')>Active</option>
                                <option value="inactive" @selected(old('status') == 'inactive')>Inactive</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <label for="jml_pinjam" class="form-label">Jumlah Pinjaman</label>
                            <input type="number" class="form-control" id="jml_pinjam" name="jml_pinjam"
                                value="{{ old('no_hp') }}" max="5">
                            @if ($errors->has('jml_pinjam'))
                                <span class="text-danger">{{ $errors->first('jml_pinjam') }}</span>
                            @endif
                        </div>

                        <div class="col mt-3">
                            <button type="submit" class="btn btn-primary btn-sm mx-2">Simpan</button>
                            <button type="button" class="btn btn-danger btn-sm btn-reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        const kodeAnggota = document.getElementById('kd_anggota');
        const namaAnggota = document.getElementById('nm_anggota');
        const jk = document.getElementById('jk');
        const tpLahir = document.getElementById('tg_lahir');
        const tgLahir = document.getElementById('tp_lahir');
        const alamat = document.getElementById('alamat');
        const noHp = document.getElementById('no_hp');
        const jnsAnggota = document.getElementById('jns_anggota');
        const status = document.getElementById('status');
        const jmlPinjam = document.getElementById('jml_pinjam');
        const btnReset = document.querySelector('.btn-reset');

        btnReset.addEventListener('click', (e) => {
            kodeAnggota.value = '';
            namaAnggota.value = '';
            jk.value = '';
            tpLahir.value = '';
            tgLahir.value = '';
            alamat.value = '';
            noHp.value = '';
            jnsAnggota.selectedIndex = 0;
            status.selectedIndex = 0;
            jmlPinjam.value = '';
        });
    </script>
@endpush
