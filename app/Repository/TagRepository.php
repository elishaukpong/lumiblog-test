<?php

namespace App\Repository;
use App\Contracts\TagInterface;
use App\Models\Tag;

class TagRepository extends BaseRepository implements TagInterface
{
    protected function getModelClass(): string
    {
        return Tag::class;
    }
}
