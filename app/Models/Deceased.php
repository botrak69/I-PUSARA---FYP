<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deceased extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'id_number',
        'lot_number',
        'tpi',
        'date_of_death',
        'x_coordinate',
        'y_coordinate',
        'additional_notes',
    ];
}
