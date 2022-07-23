<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table='profiles';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id','id');
    }

    public function sekolah()
    {
        return $this->hasOne(\App\Models\Sekolah::class, 'profile_id','id');
    }

    public function pembimbing()
    {
        return $this->hasOne(\App\Models\Pembimbing::class, 'profile_id','id');
    }

    public function district()
    {
        return $this->belongsTo(\App\Models\District::class, 'district_id','id');
    }

    public function unggahan()
    {
        return $this->hasMany(\App\Models\UnggahanBerkas::class, 'profile_id','id');
    }

    public function tahap()
    {
        return $this->hasMany(\App\Models\TahapProfile::class, 'profile_id','id');
    }
}
