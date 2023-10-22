<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'group_name',
        'description',
        'image',
        'status',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'css_class'
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
        $this->attributes['name'] = $value;
    }
}
