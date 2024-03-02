<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\KoleksiRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Koleksi";
        $koleksis = Koleksi::all();

        return view('koleksis.index', compact('koleksis', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah koleksi';

        return view('koleksis.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KoleksiRequest $request)
    {
        $validate = $request->validated();

        Koleksi::create($validate);
        Session::flash('message', 'Koleksi baru berhasil ditambahkan!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('koleksis.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Koleksi $koleksi)
    {
        $title = 'Edit koleksi';

        return view('koleksis.edit', compact('koleksi', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Koleksi $koleksi)
    {
        $validate = Validator::make($request->all(), [
            'kd_koleksi'  => ['required', 'max:30', Rule::unique('koleksis', 'kd_koleksi')->ignore($koleksi->id)],
            'judul'       => ['required', 'string', Rule::unique('koleksis', 'judul')->ignore($koleksi->id)],
            'jns_bahan_pustaka' => 'required',
            'jns_koleksi' => 'required',
            'jns_media'   => 'required',
            'pengarang'   => 'required|string|max:120',
            'penerbit'    => 'required|in:deepublish,bukunesia,grasindo,gramedia,erlangga',
            'tahun'       => 'required|numeric',
            'cetakan'     => 'required',
            'edisi'       => 'required',
            'status'      => 'nullable|in:active,inactive',
        ])->validate();
        // dd($validate);
        Koleksi::where('id', $koleksi->id)
            ->update($validate);
        Session::flash('message', 'Koleksi ' . $koleksi['judul'] . ' berhasil diupdate!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('koleksis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Koleksi $koleksi)
    {
        Koleksi::destroy($koleksi->id);
        Session::flash('message', 'Koleksi ' . $koleksi['judul'] . ' berhasil dideleted!');
        Session::flash('alert-class', 'alert-success');
        return back();
    }
}
