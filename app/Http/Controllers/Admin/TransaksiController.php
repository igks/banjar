<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Enums\TransaksiCat;
use App\Helpers\Enums\TransaksiType;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $tahun    = [2020, 2021, 2022, 2023, 2024, 2025, 2026, 2027, 2028, 2029, 2030];
    $kategori = TransaksiCat::getArray();

    return view('transaksi.index', compact('tahun', 'kategori'));
  }

  public function transaksi(Request $request) {
    $tahun     = $request->input('tahun');
    $kategori  = $request->input('kategori');
    $transaksi = null;
    if ($kategori == 0) {
      $transaksi = Transaksi::whereYear('tanggal', '=', $tahun)->orderBy('tanggal', 'DESC')->get();
    } else {
      $transaksi = Transaksi::whereYear('tanggal', '=', $tahun)
        ->where('kategori', '=', $kategori)
        ->orderBy('tanggal', 'DESC')
        ->get();
    }

    return view('transaksi.view', compact('transaksi', 'kategori', 'tahun'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $jenis    = TransaksiType::getArray();
    $kategori = TransaksiCat::getArray();

    $cacheData = [
      'tanggal'  => null,
      'jenis'    => null,
      'kategori' => null,
    ];

    return view('transaksi.form', compact('jenis', 'kategori', 'cacheData'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    $cacheData = [
      'tanggal'  => $request->input('tanggal'),
      'jenis'    => $request->input('jenis'),
      'kategori' => $request->input('kategori'),
    ];

    Transaksi::create($request->all());
    $jenis    = TransaksiType::getArray();
    $kategori = TransaksiCat::getArray();

    return view('transaksi.form', compact('jenis', 'kategori', 'cacheData'));
    // return redirect()->route('transaksi.create');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Transaksi  $transaksi
   * @return \Illuminate\Http\Response
   */
  public function show(Transaksi $transaksi) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Transaksi  $transaksi
   * @return \Illuminate\Http\Response
   */
  public function edit(int $id) {
    $jenis     = TransaksiType::getArray();
    $kategori  = TransaksiCat::getArray();
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
  public function update(int $id, Request $request) {
    Transaksi::find($id)->update($request->all());

    $tahun     = date('Y', strtotime($request->input('tanggal')));
    $kategori  = $request->input('kategori');
    $transaksi = null;
    if ($kategori == 0) {
      $transaksi = Transaksi::whereYear('tanggal', '=', $tahun)->orderBy('tanggal', 'DESC')->get();
    } else {
      $transaksi = Transaksi::whereYear('tanggal', '=', $tahun)
        ->where('kategori', '=', $kategori)
        ->orderBy('tanggal', 'DESC')
        ->get();
    }

    return view('transaksi.view', compact('transaksi', 'kategori', 'tahun'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Transaksi  $transaksi
   * @return \Illuminate\Http\Response
   */
  public function destroy(int $id) {
    Transaksi::find($id)->delete();

    return redirect()->route('transaksi.index');
  }
}