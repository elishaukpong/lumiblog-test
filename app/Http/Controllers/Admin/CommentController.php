<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CommentInterface;
use App\Http\Controllers\BaseController;
use App\Http\Requests\CommentRequest;


class CommentController extends BaseController
{
    protected $viewIndex = 'admin.comments.index';
    protected $editView = 'admin.comments.edit';
    protected $routeIndex;

    public function __construct(CommentInterface $comment, CommentRequest $request)
    {
        parent::__construct($comment,$request);
        $this->routeIndex = route('admin.comment.index');
    }

}
