<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Enums\MemberRole;
use App\Helpers\Enums\MemberStatus;
use App\Helpers\Enums\PayStatus;
use App\Http\Controllers\Controller;
use App\Models\MemberDetail;
use App\Models\MemberMaster;
use Illuminate\Http\Request;

class MemberController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    // $members = MemberMaster::all()->load('detail');
    $members = MemberMaster::with([
      'detail' => function($q)
      {
        $q->orderBy('id','ASC');
      }
    ])->get();
    return view('member.index', compact('members'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    return view('member.form');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    $master = MemberMaster::create([
      "name"     => $request->input("kepala_keluarga"),
      "address"  => $request->input("alamat"),
      "phone"    => $request->input("phone"),
      "isActive" => MemberStatus::getValue('active'),
      "isPay"    => PayStatus::getValue('bayar'),
    ]);

    MemberDetail::create([
      "member_master_id" => $master->id,
      "name"             => $request->input('istri'),
      "status"           => MemberRole::getValue('istri'),
      "phone"            => "",
      "isActive"         => MemberStatus::getValue('active'),
      "isPay"            => PayStatus::getValue('bayar'),
    ]);

    foreach ($request->input('anak') as $key => $value) {
      if ($value != null) {
        MemberDetail::create([
          "member_master_id" => $master->id,
          "name"             => $value,
          "status"           => MemberRole::getValue('anak'),
          "phone"            => "",
          "isActive"         => MemberStatus::getValue('active'),
          "isPay"            => $request->input('is_pay_' . ($key + 1)) == "on" ? PayStatus::getValue('bayar') : PayStatus::getValue('tidak bayar'),
        ]);
      }
    }

    return redirect()->route('members.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\MemberMaster  $memberMaster
   * @return \Illuminate\Http\Response
   */
  public function show(MemberMaster $memberMaster) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\MemberMaster  $memberMaster
   * @return \Illuminate\Http\Response
   */
  public function edit(int $id) {
    $data = MemberMaster::with([
      'detail' => function($q)
      {
        $q->orderBy('id','ASC');
      }
    ])->where('id','=', $id)->first();
    // dd($data);
    return view('member.edit', compact('data'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\MemberMaster  $memberMaster
   * @return \Illuminate\Http\Response
   */
  public function update(int $id, Request $request) {
    $member = MemberMaster::where('id', '=', $id)->update([
      "name"     => $request->input("kepala_keluarga"),
      "address"  => $request->input("alamat"),
      "phone"    => $request->input("phone"),
      "isActive" => MemberStatus::getValue('active'),
      "isPay"    => PayStatus::getValue('bayar'),
    ]);

    if($request->input('istri_id') != null)
    {
      MemberDetail::where('id', '=', $request->input('istri_id'))->update([
        "name"             => $request->input('istri'),
        "status"           => MemberRole::getValue('istri'),
        "phone"            => "",
        "isActive"         => MemberStatus::getValue('active'),
        "isPay"            => PayStatus::getValue('bayar'),
      ]);
    }

    for($i = 1; $i < 7; $i++)
    {
      if($request->input('anak_'.$i.'_id') == null && $request->input('anak_'.$i) != null)
      {
        MemberDetail::create([
          "member_master_id" => $id,
          "name"             => $request->input('anak_'.$i),
          "status"           => MemberRole::getValue('anak'),
          "phone"            => "",
          "isActive"         => MemberStatus::getValue('active'),
          "isPay"            => $request->input('is_pay_' . $i) == "on" ? PayStatus::getValue('bayar') : PayStatus::getValue('tidak bayar'),
        ]);
      }elseif ($request->input('anak_'.$i.'_id') != null && $request->input('anak_'.$i) != null ) {
        MemberDetail::where('id', '=', $request->input('anak_'.$i.'_id'))->update([
        "name"             => $request->input('anak_'.$i),
        "status"           => MemberRole::getValue('anak'),
        "phone"            => "",
        "isActive"         => MemberStatus::getValue('active'),
        "isPay"            => $request->input('is_pay_' . $i) == "on" ? PayStatus::getValue('bayar') : PayStatus::getValue('tidak bayar'),
      ]);
      }
    }

   return redirect()->route('members.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\MemberMaster  $memberMaster
   * @return \Illuminate\Http\Response
   */
  public function destroy(int $id) {
    $data = MemberMaster::find($id);
    $data->delete();

    return redirect()->route('members.index');
  }
}