<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(rand(25,50))->create()->each(function($post){
            $post->tags()->sync(Tag::inRandomOrder()->limit(rand(3,8))->pluck('id')->toArray());
        });
    }
}
