<?php

namespace App\Repository;

use App\Contracts\CommentInterface;
use App\Models\Comment;

class CommentRepository extends BaseRepository implements CommentInterface
{
    protected function getModelClass(): string
    {
        return Comment::class;
    }
}
