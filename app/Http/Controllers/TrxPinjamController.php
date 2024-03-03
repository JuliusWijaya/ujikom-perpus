<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Koleksi;
use Illuminate\Http\Request;
use App\Models\TransaksiPinjam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TrxPinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pinjams = TransaksiPinjam::with(['pengguna', 'anggota'])->where('id_pengguna', Auth::id())->get();

        return view('pinjams.index', [
            'title'     => 'Peminjaman',
            'pinjams'   => $pinjams,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anggotas = Anggota::all();
        $koleksis = Koleksi::all();


        // Mengambil data dari jumlah invoice yang ada dimodel
        $counting = TransaksiPinjam::count();
        // Cek jika data di model sama dengan kosong maka ditambah satu
        // ($counting === 0) ? $counting++ : $counting;
        $counter  = str_pad($counting, 3, '0', 0);
        $invoice  = 'TRP' . date('dmy') . $counter;

        return view('pinjams.create', [
            'title'     => 'Peminjaman',
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
            'no_transaksi_pinjam' => 'required|unique:transaksi_pinjams',
            'kd_anggota'        => 'required',
            'tg_pinjam'         => 'required',
            'tg_bts_kembali'    => 'required',
            'kd_koleksi'        => 'required',
            'judul'             => 'required',
            'jns_bhn_pustaka'   => 'required',
            'jns_koleksi'       => 'required',
            'jns_media'         => 'required',
        ]);

        $validate['id_pengguna'] =  Auth::user()->id;

        TransaksiPinjam::create($validate);
        Session::flash('message', 'Transaksi berhasil disimpan!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('pinjams.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Koleksi::where('kd_koleksi', $id)->first();

        return response()->json(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($pinjams)
    {
        $pinjams = TransaksiPinjam::where('id', $pinjams)->first();

        $anggotas = Anggota::all();
        $koleksis = Koleksi::all();

        return view('pinjams.edit', [
            'title'     => 'Edit Peminjaman',
            'pinjams'   => $pinjams,
            'anggotas'  => $anggotas,
            'koleksis'  => $koleksis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'no_transaksi_pinjam' => 'required',
            'kd_anggota'          => 'required',
            'tg_pinjam'           => 'required',
            'tg_bts_kembali'      => 'required',
            'kd_koleksi'          => 'required',
            'judul'               => 'required',
            'jns_bhn_pustaka'     => 'required',
            'jns_koleksi'         => 'required',
            'jns_media'           => 'required',
        ]);

        $validate['id_pengguna'] =  Auth::user()->id;

        TransaksiPinjam::where('id', $id)
            ->update($validate);
        Session::flash('message', 'No transaksi ' . $validate['no_transaksi_pinjam'] . ' berhasil diupdate!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('pinjams.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = TransaksiPinjam::findOrFail($id);
        $data->delete();

        Session::flash('message', 'Transaksi ' . $data['no_transaksi_pinjam'] . ' berhasil didelete!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('pinjams.index');
    }
}
