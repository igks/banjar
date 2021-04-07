<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MemberMaster extends Eloquent {
  use HasFactory;

  protected $table = "member_master";

  protected $fillable = [
    'name',
    'address',
    'phone',
    'isActive',
    'isPay',
  ];

  public static function rules($merge = []) {
    return array_merge(
      [
        'name'     => 'required',
        'address'  => 'required',
        'phone'    => 'required',
        'isActive' => 'required',
        'isPay'    => 'required',
      ],
      $merge
    );
  }

  public function detail() {
    return $this->hasMany(MemberDetail::class);
  }

  public function pembayaran() {
    return $this->hasMany(Pembayaran::class);
  }

  public static function getName($id) {
    $member = MemberMaster::find($id);
    return $member->name;
  }

  public static function boot() {
    parent::boot();

    static::deleting(function ($member) {
      $member->detail()->get()->each->delete();
    });
  }
}