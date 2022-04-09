<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FillingModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'background',
        'thumb',
        'is_img',
        'is_mirror',
        'available_for',
    ];

    public function getAvailableForAttribute($value)
    {
        return explode('::=::', $value);
    }
}
