<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlacePositionModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'has_gable',
        'has_impact',
        'impact_position',
    ];
}
