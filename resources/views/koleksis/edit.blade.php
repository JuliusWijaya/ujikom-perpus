@extends('layouts.main')

@section('content')
    <div class="row justify-content-center my-3">
        <div class="col-12">
            <div class="card">
                <div class="px-3 py-3">
                    <div class="d-flex justify-content-between">
                        <h5>{{ __('Edit Data') }}</h5>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('koleksis.update', $koleksi->id) }}" method="POST" class="row g-3 px-2">
                        @csrf
                        @method('PUT')
                        <div class="col-md-3 mb-3">
                            <label for="kd_koleksi" class="form-label">Kode Koleksi</label>
                            <input class="form-control @error('kd_koleksi') is-invalid @enderror" type="text"
                                id="kd_koleksi" name="kd_koleksi" autocomplete="off" autofocus required
                                value="{{ old('kd_koleksi', $koleksi->kd_koleksi) }}">
                            @if ($errors->has('kd_koleksi'))
                                <span class="text-danger">{{ $errors->first('kd_koleksi') }}</span>
                            @endif
                        </div>

                        <div class="col-md-9 mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input class="form-control @error('judul') is-invalid @enderror" type="text" id="judul"
                                name="judul" autocomplete="off" required value="{{ old('judul', $koleksi->judul) }}"
                                autocomplete="off">
                            @if ($errors->has('judul'))
                                <span class="text-danger">{{ $errors->first('judul') }}</span>
                            @endif
                        </div>

                        <div class="col-4">
                            <label for="jns_bahan_pustaka" class="form-label">Jenis Pustaka</label>
                            <select id="jns_bahan_pustaka" name="jns_bahan_pustaka"
                                class="form-control @error('jns_bahan_pustaka') is-invalid @enderror" required>
                                <option selected>-- Bahan Pustaka --</option>
                                <option value="subjek dasar" @selected(old('jns_bahan_pustaka', $koleksi->jns_bahan_pustaka) == 'subjek dasar')>
                                    Subjek Dasar
                                </option>
                                <option value="subjek majemuk" @selected(old('jns_bahan_pustaka', $koleksi->jns_bahan_pustaka) == 'subjek majemuk')>
                                    Subjek Majemuk
                                </option>
                                <option value="subjek kompleks" @selected(old('jns_bahan_pustaka', $koleksi->jns_bahan_pustaka) == 'subjek kompleks')>
                                    Subjek Kompleks
                                </option>
                            </select>
                            @if ($errors->has('jns_bahan_pustaka'))
                                <span class="text-danger">{{ $errors->first('jns_bahan_pustaka') }}</span>
                            @endif
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="jns_koleksi" class="form-label">Jenis Koleksi</label>
                            <select id="jns_koleksi" name="jns_koleksi"
                                class="form-control @error('jns_koleksi') is-invalid @enderror" required>
                                <option selected>-- Jenis Koleksi --</option>
                                <option value="buku" @selected(old('jns_koleksi', $koleksi->jns_koleksi) == 'buku')>
                                    Buku
                                </option>
                                <option value="novel" @selected(old('jns_koleksi', $koleksi->jns_koleksi) == 'novel')>
                                    Penelitian
                                </option>
                                <option value="artikel" @selected(old('jns_koleksi', $koleksi->jns_koleksi) == 'artikel')>
                                    Artikel
                                </option>
                            </select>

                            @if ($errors->has('jns_koleksi'))
                                <span class="text-danger">{{ $errors->first('jns_koleksi') }}</span>
                            @endif
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="jns_media" class="form-label">Jenis Media</label>
                            <select class="form-control @error('jns_media') is-invalid @enderror" id="jns_media"
                                name="jns_media" aria-label="jns_media">
                                <option value="">Choose</option>
                                <option value="online" @selected(old('jns_media', $koleksi->jns_media) == 'online')>
                                    Online
                                </option>
                                <option value="offline" @selected(old('jns_media', $koleksi->jns_media) == 'offline')>
                                    Offline
                                </option>
                            </select>
                            @if ($errors->has('jns_media'))
                                <span class="text-danger">{{ $errors->first('jns_media') }}</span>
                            @endif
                        </div>

                        <div class="col-9 mb-3">
                            <label for="pengarang" class="form-label @error('pengarang') is-invalid @enderror">
                                Pengarang
                            </label>
                            <input type="text" class="form-control" id="pengarang" name="pengarang"
                                placeholder="Masukan nama pengarang" value="{{ old('pengarang', $koleksi->pengarang) }}"
                                autocomplete="off">
                            @if ($errors->has('pengarang'))
                                <span class="text-danger">{{ $errors->first('pengarang') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <select id="penerbit" name="penerbit"
                                class="form-control @error('penerbit') is-invalid @enderror">
                                <option selected>-- Pilih Penerbit --</option>
                                <option value="deepublish" @selected(old('penerbit', $koleksi->penerbit) == 'deepublish')>
                                    Deepublish
                                </option>
                                <option value="gramedia" @selected(old('penerbit', $koleksi->penerbit) == 'gramedia')>
                                    Gramedia
                                </option>
                                <option value="erlangga" @selected(old('penerbit', $koleksi->penerbit) == 'erlangga')>
                                    Erlangga
                                </option>
                            </select>
                            @if ($errors->has('penerbit'))
                                <span class="text-danger">{{ $errors->first('penerbit') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <select id="tahun" name="tahun" class="form-control @error('tahun') is-invalid @enderror"
                                required>
                                <option selected>-- Tahun --</option>
                                @for ($y = date('Y'); $y >= date('Y') - 5; $y--)
                                    <option value="{{ $y }}" @selected(old('tahun', $koleksi->tahun) == $y)>
                                        {{ $y }}
                                    </option>
                                @endfor
                            </select>
                            @if ($errors->has('tahun'))
                                <span class="text-danger">{{ $errors->first('tahun') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <label for="cetakan" class="form-label">Cetakan</label>
                            <input class="form-control @error('cetakan') is-invalid @enderror" type="text" id="cetakan"
                                name="cetakan" value="{{ old('cetakan', $koleksi->cetakan) }}" min="1"
                                max="5" autocomplete="off">
                            @if ($errors->has('cetakan'))
                                <span class="text-danger">{{ $errors->first('cetakan') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <label for="edisi" class="form-label">Edisi</label>
                            <input class="form-control @error('edisi') is-invalid @enderror" type="text"
                                id="edisi" name="edisi" value="{{ old('edisi', $koleksi->edisi) }}"
                                autocomplete="off">
                            @if ($errors->has('edisi'))
                                <span class="text-danger">{{ $errors->first('edisi') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status"
                                class="form-control @error('status') is-invalid @enderror">
                                <option selected>-- Pilih Status --</option>
                                <option value="active" @selected(old('status', $koleksi->status) == 'active')>
                                    Active
                                </option>
                                <option value="inactive" @selected(old('status', $koleksi->status) == 'inactive')>
                                    Inactive
                                </option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                        </div>

                        <div class="col my-3">
                            <button type="submit" class="btn btn-primary btn-sm mx-2">Simpan perubahan</button>
                            <a href="{{ route('koleksis.index') }}" class="link">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
