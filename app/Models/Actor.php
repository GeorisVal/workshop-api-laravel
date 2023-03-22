<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'firstname',
        'lastname',
        'age',
        'bio',
        'profile_pic'
    ];
}
