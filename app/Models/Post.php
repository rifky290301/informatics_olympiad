<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $table='posts';
    protected $guarded = [];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value, '-');
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id','id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id','id');
    }

    public function unduhan()
    {
        return $this->hasMany(\App\Models\Unduhan::class, 'post_id','id');
    }
}
