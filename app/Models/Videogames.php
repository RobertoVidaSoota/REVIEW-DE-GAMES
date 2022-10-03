<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videogames extends Model
{
    use HasFactory;

    public $fillable = 
    [
        'name_game',
        'collection',
        'developer',
        'owner',
        'gnder',
        'year',
        'version'
    ];
}
