<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_experience',
        'position',
        'from',
        'to',
        'place',
        'about',
        'description',
    ];
}
