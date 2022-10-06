<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirements extends Model
{
    use HasFactory;

    public $fillable = 
    [
        'hardware',
        'value',
        'level',
        'fk_id_videogames'
    ];
}
