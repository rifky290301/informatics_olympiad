<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahap extends Model
{
    use HasFactory;
    protected $table='tahaps';
    protected $guarded = [];

    public function tahapprofile()
    {
        return $this->hasMany(\App\Models\TahapProfile::class, 'tahap_id','id');
    }

    public function ujian()
    {
        return $this->hasMany(\App\Models\Ujian::class, 'tahap_id','id');
    }
}
