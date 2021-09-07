<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    const rules = [
        'title' => 'required | string',
        'text' => 'required | string',
        'tags_id.*' => 'nullable | exists:tags,id'
    ];

    protected $guarded = [];

    public function getShortTextAttribute()
    {
        return Str::limit($this->text,50);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function getPrimaryTagAttribute()
    {
        return $this->tags->first()->name ?? 'Uncategorized';
    }
}
