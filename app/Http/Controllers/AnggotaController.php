<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\AnggotaRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggotas = Anggota::all();

        return view('anggotas.index', [
            'title'     => 'Anggota',
            'anggotas'  => $anggotas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggotas.create', [
            'title'     => 'Anggota',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnggotaRequest $request)
    {
        $validate = $request->validated();
        Anggota::create($validate);
        Session::flash('message', 'Anggota baru berhasil ditambahkan!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('anggotas.index');
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
    public function edit(Anggota $anggota)
    {
        $title = 'Edit Anggota';

        return view('anggotas.edit', compact('anggota', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggota $anggota)
    {
        $validate = Validator::make($request->all(), [
            'kd_anggota'  => ['required', 'max:15', Rule::unique('anggotas')->ignore($anggota->id)],
            'nm_anggota'  => ['required', 'string', 'max:120'],
            'jk'          => ['required', 'in:L,P'],
            'tp_lahir'    => ['required', 'max:130'],
            'tg_lahir'    => ['required', 'date'],
            'alamat'      => ['required'],
            'no_hp'       => ['required', 'max_digits:13'],
            'jns_anggota' => ['required', 'in:member,non member'],
            'status'      => ['sometimes', 'in:active,inactive'],
            'jml_pinjam'  => ['sometimes', 'integer'],
        ])->validate();

        // dd($validate);
        Anggota::where('id', $anggota->id)
            ->update($validate);
        Session::flash('message', 'Anggota ' . $anggota['nm_anggota'] . ' berhasil di update!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('anggotas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        Session::flash('message', 'Anggota ' . $anggota['nm_anggota'] . 'berhasil di deleted!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('anggotas.index');
    }
}
