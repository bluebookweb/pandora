<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'width',
        'height',
        'depth',
        'thumb',
        'front',
        'top',
        'product_code',
        'category_id',
        'fits_in',
    ];

    public function getFitsInAttribute($value)
    {
        return explode('::=::', $value);
    }
}
