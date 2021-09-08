<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    const rules = [
        'post_id' => 'required | integer | exists:posts,id',
        'text' => 'required | string'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function getShortPostTitleAttribute()
    {
        return Str::limit($this->post->title,15);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
