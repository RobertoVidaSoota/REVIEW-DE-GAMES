<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    public $fillable = 
    [
        'id',
        'name_review',
        'desc_review',
        'thumb',
        'date_review',
        'rate',
        'fk_id_users'
    ];
}
