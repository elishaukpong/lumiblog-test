<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];

    const rules = [
        'name' => 'required | string',
        'description' => 'string'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }
}
