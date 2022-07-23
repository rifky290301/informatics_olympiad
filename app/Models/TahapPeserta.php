<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahapPeserta extends Model
{
    use HasFactory;
    protected $table='tahap_pesertas';
    protected $guarded = [];

    public function profile()
    {
        return $this->belongsTo(\App\Models\Profile::class, 'profile_id','id');
    }

    public function tahap()
    {
        return $this->belongsTo(\App\Models\Tahap::class, 'tahap_id','id');
    }
}
