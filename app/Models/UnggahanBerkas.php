<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnggahanBerkas extends Model
{
    use HasFactory;
    protected $table='unggahan_berkas';
    protected $guarded = [];

    public function berkasss()
    {
        return $this->belongsTo(\App\Models\Berkas::class, 'berkas_id','id');
    }

    public function profile()
    {
        return $this->belongsTo(\App\Models\Profile::class, 'profile_id','id');
    }
}
