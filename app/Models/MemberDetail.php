<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberDetail extends Model
{
    use HasFactory;

    protected $table ="member_detail";

    protected $fillable = [
        'master_id',
        'name',
        'status',
        'phone',
        'isActive',
        'isPay'
    ];

    public static function rules($merge = [])
    {
        return array_merge(
            [
                'master_id' => 'required',
                'name' => 'required',
                'status' => 'required',
                'phone' => 'nullable',
                'isActive' => 'required',
                'isPay' => 'required',
            ],
            $merge
        );
    }

    public function master()
    {
        return $this->belongsTo(MemberMaster::class);
    }
}