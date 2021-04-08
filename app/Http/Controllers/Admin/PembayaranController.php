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
    return redirect()->route('laporan.create');
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
  public function edit(int $id) {
    $data = Pembayaran::find($id);
    $warga = MemberMaster::all();
    $iuran = Laporan::getArray();
    $tahun = [2020, 2021, 2022, 2023, 2024, 2025, 2026, 2027, 2028, 2029, 2030];
    $bulan = Bulan::getArray();
    // dd($data);
    return view('pembayaran.edit', compact('data', 'warga', 'iuran', 'tahun', 'bulan'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Pembayaran  $pembayaran
   * @return \Illuminate\Http\Response
   */
  public function update(int $id, Request $request) {
    Pembayaran::find($id)->update($request->all());

    return redirect()->route('laporan.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pembayaran  $pembayaran
   * @return \Illuminate\Http\Response
   */
  public function destroy(int $id) {
    $data = Pembayaran::find($id);
    $data->delete();

    return redirect()->route('laporan.index');
  }
}