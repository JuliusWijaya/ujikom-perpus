@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    <form action="{{ route('pinjams.store') }}" method="POST" class="row">
                        @csrf
                        <div class="col-4">
                            <label for="no_transaksi_pinjam" class="form-label">No Transaksi</label>
                            <input type="text" class="form-control" id="no_transaksi_pinjam" name="no_transaksi_pinjam"
                                value="{{ old('no_transaksi_pinjam', $invoice) }}">
                        </div>

                        <div class="col-4">
                            <label for="kd_anggota" class="form-label">Nama Anggota</label>
                            <select class="form-control" name="kd_anggota" id="kd_anggota">
                                <option selected>-- Pilih Anggota --</option>
                                @foreach ($anggotas as $val)
                                    <option value="{{ $val->kd_anggota }}" @selected(old('kd_anggota'))>
                                        {{ $val->nm_anggota }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4 mb-2">
                            <label for="tg_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="date" class="form-control" name="tg_pinjam" id="tg_pinjam"
                                value="{{ old('tg_pinjam') }}">
                        </div>

                        <div class="col-4">
                            <label for="tg_bts_kembali" class="form-label">Tanggal Kembali</label>
                            <input type="date" class="form-control" name="tg_bts_kembali" id="tg_bts_kembali"
                                value="{{ old('tg_bts_kembali') }}">
                        </div>

                        <div class="col-4">
                            <label for="kd_koleksi" class="form-label">Kode Koleksi</label>
                            <select class="form-control" name="kd_koleksi" id="kd_koleksi">
                                <option selected>-- Pilih Koleksi --</option>
                                @foreach ($koleksis as $item)
                                    <option value="{{ $item->kd_koleksi }}" @selected(old('kd_koleksi'))>
                                        {{ $item->kd_koleksi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul"
                                value="{{ old('judul') }}">
                        </div>

                        <div class="col-4 mt-3">
                            <label for="jns_bhn_pustaka" class="form-label">Bahan Pustaka</label>
                            <input type="text" class="form-control" name="jns_bhn_pustaka" id="jns_bhn_pustaka"
                                value="{{ old('jns_bhn_pustaka') }}">
                        </div>

                        <div class="col-4 mt-3">
                            <label for="jns_koleksi" class="form-label">Jenis Koleksi</label>
                            <input type="text" class="form-control" name="jns_koleksi" id="jns_koleksi"
                                value="{{ old('jns_koleksi') }}">
                        </div>

                        <div class="col-4 mt-3">
                            <label for="jns_media" class="form-label">Media</label>
                            <input type="text" class="form-control" name="jns_media" id="jns_media"
                                value="{{ old('jns_media') }}">
                        </div>

                        <div class="col mt-4">
                            <button type="submit" class="btn btn-success mx-3">Simpan</button>
                            <a href="{{ route('pinjams.index') }}" class="btn btn-info">Kembali</a>
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
            $('#kd_koleksi').change(function(e) {
                e.preventDefault();
                var result = $(this).val();

                // console.log(result);

                $.ajax({
                    type: "GET",
                    url: "{{ url('pinjams') }}/" + result,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        const {
                            judul,
                            jns_bahan_pustaka,
                            jns_koleksi,
                            jns_media,
                        } = response.data;

                        $('#judul').val(judul);
                        $('#jns_bhn_pustaka').val(jns_bahan_pustaka);
                        $('#jns_koleksi').val(jns_koleksi);
                        $('#jns_media').val(jns_media);
                    }
                });
            });
        });
    </script>
@endpush
