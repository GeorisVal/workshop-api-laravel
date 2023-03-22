<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'release_at',
        'seasons',
        'episodes',
        'director',
        'preview_image',
        'available'
    ];
}
