<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $table='sekolahs';
    protected $guarded = [];

    public function profile()
    {
        return $this->belongsTo(\App\Models\Profile::class, 'profile_id','id');
    }

    public function district()
    {
        return $this->belongsTo(\App\Models\District::class, 'district_id','id');
    }
}
