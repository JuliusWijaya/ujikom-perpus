<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiKembali;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Laporan';

        return view('laporans.index', [
            'title' => $title,
            'data'  => [],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = TransaksiKembali::with(['anggota', 'pengguna'])->whereBetween('tg_pinjam', [$request->tg_awal, $request->tg_akhir])->get()->toArray();
        $title = 'Laporan';
        // return view('laporans/report', compact('data', 'title'));
        $pdf = PDF::loadView('laporans.report', compact('data', 'title'));
        return $pdf->stream('report.pdf');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
