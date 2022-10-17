<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function columns()
    {
        return $this->hasMany(Column::class);
    }

    public function compositions()
    {
        return $this->hasMany(VariantComposition::class);
    }

    public function isFirstVisit(): bool
    {
        return is_null($this->last_id);
    }

    public function recordLastVisited(?VariantComposition $variant): void
    {
        if(is_null($variant)){
            return;
        }

        $this->update([
           'last_id' => $variant->id
        ]);
    }
}
