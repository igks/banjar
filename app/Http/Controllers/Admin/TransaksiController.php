<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Helpers\Enums\TransaksiType;
use App\Helpers\Enums\TransaksiCat;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun   = [2020, 2021, 2022, 2023, 2024, 2025, 2026, 2027, 2028, 2029, 2030];
        $kategori = TransaksiCat::getArray();
        
        return view('transaksi.index', compact('tahun','kategori'));
    }

    public function transaksi(Request $request)
    {
        $tahun   = $request->input('tahun');
        $kategori = $request->input('kategori');
        $transaksi = null;
        if($kategori == 0)
        {
            $transaksi = Transaksi::whereYear('tanggal', '=', $tahun)->get();
        }else{
            $transaksi = Transaksi::whereYear('tanggal', '=', $tahun)
                ->where('kategori', '=', $kategori)
                ->get();
        }

        return view('transaksi.view', compact('transaksi', 'kategori', 'tahun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = TransaksiType::getArray();
        $kategori = TransaksiCat::getArray();

        return view('transaksi.form', compact('jenis','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Transaksi::create($request->all());
        return redirect()->route('transaksi.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $jenis = TransaksiType::getArray();
        $kategori = TransaksiCat::getArray();
        $transaksi = Transaksi::find($id);

        return view('transaksi.edit', compact('jenis', 'kategori', 'transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, Request $request)
    {
        Transaksi::find($id)->update($request->all());

        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Transaksi::find($id)->delete();

        return redirect()->route('transaksi.index');
    }
}
