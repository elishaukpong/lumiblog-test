<?php

namespace App\Repository;

use App\Contracts\PostInterface;
use App\Models\Post;

class PostRepository extends BaseRepository implements PostInterface
{
    protected $order = 'id';

    protected $direction = 'desc';

    protected function getModelClass(): string
    {
        return Post::class;
    }

    public function create($data = [])
    {

        $item = parent::create([
            'title' => $data['title'],
            'text' => $data['text'],
            'user_id' => $data['user_id'] ?? auth()->id()
        ]);

        if(isset($data['tags_id']) && $item){
            $item->tags()->sync($data['tags_id']);
        }

        return $item;
    }

    public function update($entityId = 0, $data =[])
    {
        $item = parent::update($entityId,[
            'title' => $data['title'],
            'text' => $data['text'],
        ]);

        if(isset($data['tags_id']) && $item){
            $item->tags()->sync($data['tags_id']);
        }

        return $item;
    }
}
