<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Enums\Bulan;
use App\Helpers\Enums\Laporan;
use App\Http\Controllers\Controller;
use App\Models\MemberMaster;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $laporan = Laporan::getArray();
    $tahun   = [2020, 2021, 2022, 2023, 2024, 2025, 2026, 2027, 2028, 2029, 2030];

    return view('pembayaran.index', compact('laporan', 'tahun'));
  }

  public function laporan(Request $request) {
    $iuran = $request->input('iuran');
    $tahun = $request->input('tahun');

    $laporan = Pembayaran::
      where('jenis', $iuran)
      ->where('tahun', $tahun)->with('member')
      ->get()
      ->groupBy('member_master_id');

    return view('pembayaran.laporan', compact('laporan'));
    // dd($laporan);
  }

  public function kasBanjar() {
    return view('pembayaran.index');
  }

  public function kasBOP() {
    return view('pembayaran.index');
  }

  public function kasNyepi() {
    return view('pembayaran.index');
  }

  public function kasPiodalan() {
    return view('pembayaran.index');
  }

  public function kasBanten() {
    return view('pembayaran.index');
  }

  public function kasWHDI() {
    return view('pembayaran.index');
  }

  public function kasOprasional() {
    return view('pembayaran.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $warga = MemberMaster::all();
    $iuran = Laporan::getArray();
    $tahun = [2020, 2021, 2022, 2023, 2024, 2025, 2026, 2027, 2028, 2029, 2030];
    $bulan = Bulan::getArray();

    return view('pembayaran.form', compact('warga', 'iuran', 'tahun', 'bulan'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    Pembayaran::create($request->all());
    return redirect()->route('laporan.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pembayaran  $pembayaran
   * @return \Illuminate\Http\Response
   */
  public function show(Pembayaran $pembayaran) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pembayaran  $pembayaran
   * @return \Illuminate\Http\Response
   */
  public function edit(Pembayaran $pembayaran) {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Pembayaran  $pembayaran
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Pembayaran $pembayaran) {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pembayaran  $pembayaran
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pembayaran $pembayaran) {
    //
  }
}