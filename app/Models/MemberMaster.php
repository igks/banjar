<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberMaster extends Model
{
    use HasFactory;

    protected $table ="member_master";

    protected $fillable = [
        'name',
        'address',
        'phone',
        'isActive',
        'isPay'
    ];

    public static function rules($merge = [])
    {
        return array_merge(
            [
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'isActive' => 'required',
                'isPay' => 'required',
            ],
            $merge
        );
    }

    public function detail()
    {
        return $this->hasMany(MemberDetail::class);
    }
}