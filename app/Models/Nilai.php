<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table='nilais';
    protected $guarded= ['id'];


    public function ujian()
    {
        return $this->belongsTo(\App\Models\Ujian::class, 'ujian_id','id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id','id');
    }
}
