@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <div class="px-3 py-3">
                    <h5>{{ __('Tambah Data') }}</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('kembalis.store') }}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-4 mb-3">
                            <label for="no_transaksi_kembali" class="form-label">
                                No Transaksi Kembali
                            </label>
                            <input type="text" id="no_transaksi_kembali" class="form-control" name="no_transaksi_kembali"
                                required autofocus>
                            @if ($errors->has('no_transaksi_kembali'))
                                <span class="text-danger">{{ $errors->first('no_transaksi_kembali') }}</span>
                            @endif
                        </div>

                        <div class="col-4 mb-3">
                            <label for="no_transaksi_pinjam" class="form-label">
                                No Transaksi Pinjam
                            </label>
                            <select class="form-control" id="no_transaksi_pinjam" name="no_transaksi_pinjam"
                                aria-label="no_transaksi_pinjam">
                                <option value="">Choose</option>
                                @foreach ($pinjams as $item)
                                    <option value="{{ $item->no_transaksi_pinjam }}">
                                        {{ $item->no_transaksi_pinjam }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('no_transaksi_pinjam'))
                                <span class="text-danger">{{ $errors->first('no_transaksi_pinjam') }}</span>
                            @endif
                        </div>

                        <div class="col-4 mb-3">
                            <label for="kd_anggota" class="form-label">Nama Anggota</label>
                            <select class="form-control" id="kd_anggota" name="kd_anggota" aria-label="kd_anggota"
                                autofocus>
                                <option>Choose</option>
                                @foreach ($anggotas as $item)
                                    <option value="{{ $item->kd_anggota }}">{{ $item->nm_anggota }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('kd_anggota'))
                                <span class="text-danger">{{ $errors->first('kd_anggota') }}</span>
                            @endif
                        </div>

                        <div class="col-3 mb-3">
                            <label for="kd_koleksi" class="form-label">Kode Koleksi</label>
                            <select class="form-control" id="kd_koleksi" name="kd_koleksi" aria-label="kd_koleksi">
                                <option value="">Choose</option>
                                @foreach ($koleksis as $item)
                                    <option value="{{ $item->kd_koleksi }}">{{ $item->kd_koleksi }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('kd_koleksi'))
                                <span class="text-danger">{{ $errors->first('kd_koleksi') }}</span>
                            @endif
                        </div>

                        <div class="col-3 mb-3">
                            <label for="tg_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="date" id="tg_pinjam" class="form-control" name="tg_pinjam" required>
                            @if ($errors->has('tg_pinjam'))
                                <span class="text-danger">{{ $errors->first('tg_pinjam') }}</span>
                            @endif
                        </div>

                        <div class="col-3 mb-3">
                            <label for="tg_kembali" class="form-label">Tanggal Kembali</label>
                            <input type="date" id="tg_kembali" class="form-control" name="tg_kembali" required>
                            @if ($errors->has('tg_kembali'))
                                <span class="text-danger">{{ $errors->first('tg_kembali') }}</span>
                            @endif
                        </div>

                        <div class="col-3 mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" id="judul" class="form-control" name="judul" required autofocus>
                            @if ($errors->has('judul'))
                                <span class="text-danger">{{ $errors->first('judul') }}</span>
                            @endif
                        </div>

                        <div class="col-3 mb-3">
                            <label for="jns_bhn_pustaka" class="form-label">
                                Jenis Bahan Pustaka
                            </label>
                            <input type="text" id="jns_bhn_pustaka" class="form-control" name="jns_bhn_pustaka" required
                                autofocus>
                            @if ($errors->has('jns_bhn_pustaka'))
                                <span class="text-danger">{{ $errors->first('jns_bhn_pustaka') }}</span>
                            @endif
                        </div>

                        <div class="col-3 mb-3">
                            <label for="jns_koleksi" class="form-label">Jenis Koleksi</label>
                            <select class="form-control" id="jns_koleksi" name="jns_koleksi" aria-label="jns_koleksi">
                                <option>Choose</option>
                                <option value="buku">Buku</option>
                                <option value="novel">Penelitian</option>
                                <option value="artikel">Artikel</option>
                            </select>
                            @if ($errors->has('jns_koleksi'))
                                <span class="text-danger">{{ $errors->first('jns_koleksi') }}</span>
                            @endif
                        </div>

                        <div class="col-3 mb-3">
                            <label for="jns_media" class="form-label">Jenis Media</label>
                            <input type="text" id="jns_media" class="form-control" name="jns_media" required autofocus>
                            {{-- <select class="form-control" id="jns_media" name="jns_media" aria-label="jns_media">
                                <option value="">Choose</option>
                                <option value="online">Online</option>
                                <option value="offline">Offline</option>
                            </select> --}}
                            @if ($errors->has('jns_media'))
                                <span class="text-danger">{{ $errors->first('jns_media') }}</span>
                            @endif
                        </div>

                        <div class="col-3 mb-3">
                            <label for="denda" class="form-label">Denda</label>
                            <input type="text" id="denda" class="form-control" name="denda" required autofocus>
                            @if ($errors->has('denda'))
                                <span class="text-danger">{{ $errors->first('denda') }}</span>
                            @endif
                        </div>

                        <div class="col-12 mb-3">
                            <label for="ket" class="form-label text-right">Keterangan</label>
                            <select class="form-control" id="ket" name="ket" aria-label="jns_media">
                                <option value="">Choose</option>
                                <option value="sudah" @selected(old('ket') == 'sudah')>Sudah</option>
                                <option value="belum" @selected(old('ket') == 'belum')>Belum</option>
                            </select>
                            @if ($errors->has('ket'))
                                <span class="text-danger">{{ $errors->first('ket') }}</span>
                            @endif
                        </div>

                        <div class="col mb-3 p-2">
                            <button type="submit" class="btn btn-primary mx-3">
                                Simpan
                            </button>

                            <a href="{{ route('kembalis.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#no_transaksi_pinjam').on('change', function(e) {
                e.preventDefault();
                var result = $(this).val();
                // console.log(result);

                $.ajax({
                    type: "GET",
                    url: "{{ url('kembalis') }}/" + result,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        var {
                            no_transaksi_pinjam,
                            kd_anggota,
                            tg_pinjam,
                            tg_kembali,
                            kd_koleksi,
                            judul,
                            jns_bhn_pustaka,
                            jns_koleksi,
                            jns_media,
                        } = response.data;

                        $('#no_transaksi_pinjam').val(no_transaksi_pinjam);
                        $('#kd_anggota').val(kd_anggota);
                        $('#tg_pinjam').val(tg_pinjam);
                        $('#tg_kembali').val(tg_kembali);
                        $('#kd_koleksi').val(kd_koleksi);
                        $('#judul').val(judul);
                        $('#jns_bhn_pustaka').val(jns_bhn_pustaka);
                        $('#jns_koleksi').val(jns_koleksi);
                        $('#jns_media').val(jns_media);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('#tg_kembali').on('change', function() {
                var nil = $(this).val();

                $.ajax({
                    type: "GET",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    url: "{{ url('kembalis') }}/" + $('#no_transaksi_pinjam').val(),
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                        var kembali = new Date(nil);
                        var tanggalBatas = new Date(response.tg_bts_kembali);
                        console.log(tanggalBatas);
                        var selisih = Math.round(Math.round((kembali.getTime() - tanggalBatas
                            .getTime()) / (oneDay)));

                        if (selisih > 30) {
                            $('#denda').val(selisih * 1000);
                        } else if (selisih > 7) {
                            $('#denda').val(selisih * 500);
                        } else if (selisih > 1) {
                            parseInt($('#denda').val("2000"));
                        }
                        // console.log(selisih);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });

        })


        // function hitungDenda(tanggalKembali) {

        //     $.ajax({
        //         type: "GET",
        //         headers: {
        //             "Content-Type": "application/json"
        //         },
        //         url: "{{ url('kembalis') }}/" + $('#no_transaksi_pinjam').val(),
        //         success: function(response) {
        //             var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
        //             var kembali = new Date(tanggalKembali);
        //             var tanggalBatas = new Date(response.tg_bts_kembali);
        //             var selisih = Math.round(Math.round((kembali.getTime() - tanggalBatas.getTime()) / (
        //                 oneDay)));

        //             if (selisih > 30) {
        //                 $('#denda').val(selisih * 1000);
        //             } else if (selisih > 7) {
        //                 $('#denda').val(selisih * 500);
        //             } else if (selisih > 1) {
        //                 $('#denda').val("2000");
        //             }
        //             console.log(selisih);
        //         },
        //         error: function(err) {
        //             console.log(err);
        //         }
        //     });
        // }
    </script>
@endpush
