<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coments extends Model
{
    use HasFactory;

    public $fillable = 
    [
        'id',
        'text_coment',
        'fk_id_reviews',
        'fk_id_users'
    ];
}
