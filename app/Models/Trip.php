<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'depature_loc_id',
        'return_loc_id',
        'departure_date',
        'return_date',
        'price',
        'departure_time',
        'return_time',
    ];
}
