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

    public $searchable = [
        'title', 'text'
    ];

    protected $appends = ['url'];

    protected $guarded = [];

    public function getShortTextAttribute()
    {
        return Str::limit($this->text,200);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function metas()
    {
        return $this->hasMany(Meta::class);
    }

    public function getDatePostedAttribute()
    {
        return $this->created_at->format('d M Y');
    }

    public function geturlAttribute()
    {
        return route('show.post',$this->id);
    }

    public function hasTag(Tag $tag)
    {
        return in_array($tag->id,$this->tags->pluck('id')->toArray());
    }
}
