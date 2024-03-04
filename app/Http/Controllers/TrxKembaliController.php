<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Koleksi;
use Illuminate\Http\Request;
use App\Models\TransaksiPinjam;
use App\Models\TransaksiKembali;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class TrxKembaliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kembalis = TransaksiKembali::with('anggota')->where('id_pengguna', Auth::id())->get();

        return view('kembalis.index', [
            'title'     => "Pengembalian",
            'kembalis'  => $kembalis,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pinjams = TransaksiPinjam::all();
        $anggotas = Anggota::all();
        $koleksis = Koleksi::All();

        // Mengambil data dari jumlah invoice yang ada dimodel TransaksiKembali
        // Hitung jumlah record yang ada dimodel
        $counting = TransaksiKembali::count();
        $counter  = str_pad($counting, 3, '0', 0);
        $invoice  = 'TRP' . date('dmy') . $counter;

        return view('kembalis.create', [
            'title'     => "Pengembalian",
            'pinjams'   => $pinjams,
            'anggotas'  => $anggotas,
            'koleksis'  => $koleksis,
            'invoice'   => $invoice,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'no_transaksi_pinjam'  => 'required',
            'no_transaksi_kembali' => 'required|unique:transaksi_kembalis',
            'kd_anggota'           => 'required',
            'tg_pinjam'            => 'required',
            'tg_kembali'           => 'required',
            'kd_koleksi'           => 'required',
            'judul'                => 'required',
            'jns_bhn_pustaka'      => 'required',
            'jns_koleksi'          => 'required',
            'jns_media'            => 'required',
            'denda'                => 'required',
            'ket'                  => 'required',
        ]);

        $validate['id_pengguna'] = Auth::id();

        try {
            DB::beginTransaction();

            TransaksiKembali::create($validate);

            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();

            Session::flash('message', 'Transaksi kembali gagal disimpan!');
            Session::flash('alert-class', 'alert-warning');

            return redirect()->route('kembalis.index');
        }


        Session::flash('message', 'Transaksi kembali berhasil disimpan!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('kembalis.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = TransaksiPinjam::where('no_transaksi_pinjam', $id)->first();

        return response()->json(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kembali = TransaksiKembali::where('id', $id)->first();
        $pinjams = TransaksiPinjam::all();
        $anggotas = Anggota::all();
        $koleksis = Koleksi::All();

        return view('kembalis.edit', [
            'title'     => 'Edit transaksi',
            'kembali'   => $kembali,
            'pinjams'   => $pinjams,
            'anggotas'  => $anggotas,
            'koleksis'  => $koleksis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'no_transaksi_pinjam'  => 'required',
            'no_transaksi_kembali' => 'required',
            'kd_anggota'           => 'required',
            'tg_pinjam'            => 'required',
            'tg_kembali'           => 'required',
            'kd_koleksi'           => 'required',
            'judul'                => 'required',
            'jns_bhn_pustaka'      => 'required',
            'jns_koleksi'          => 'required',
            'jns_media'            => 'required',
            'denda'                => 'required',
            'ket'                  => 'required',
        ]);

        $validate['id_pengguna'] = Auth::id();

        TransaksiKembali::where('id', $id)
            ->update($validate);

        Session::flash('message', 'No transaksi ' . $validate['no_transaksi_kembali'] . ' berhasil diupdate!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('kembalis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = TransaksiKembali::find($id);
        $data->delete();

        Session::flash('message', 'No transaksi ' . $data['no_transaksi_kembali'] . ' berhasil didelete!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('kembalis.index');
    }
}
