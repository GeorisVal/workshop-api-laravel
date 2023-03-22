<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'release_at',
        'duration',
        'director',
        'preview_image',
        'available'
    ];
}
