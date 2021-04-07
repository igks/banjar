<?php

namespace App\Models;

use App\Helpers\Enums\Bulan;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Eloquent {
  use HasFactory;

  protected $table = "pembayaran";

  protected $fillable = [
    'member_master_id',
    'jenis',
    'tahun',
    'bulan',
    'jumlah',
    'keterangan',
  ];

  public function member() {
    return $this->belongsTo(MemberMaster::class);
  }

  public static function getBulan($value) {
    return Bulan::getString($value);
  }
}