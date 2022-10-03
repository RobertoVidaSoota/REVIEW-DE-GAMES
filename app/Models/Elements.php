<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elements extends Model
{
    use HasFactory;

    public $fillable = 
    [
        'name_element',
        'text_element',
        'fk_id_reviews'
    ];
}
