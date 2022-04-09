<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryCategoryModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'thumb',
        'snap_floor',
        'top_view',
        'snap_to_category',
    ];

    public function getSnapToCategoryAttribute($value)
    {
        return explode('::=::', $value);
    }
}
