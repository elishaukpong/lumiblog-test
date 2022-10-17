<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantComposition extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getCompositionIdsAttribute($value)
    {
        return json_decode($value);
    }

    public function getCompositionValuesAttribute($value)
    {
        return json_decode($value);
    }
}
