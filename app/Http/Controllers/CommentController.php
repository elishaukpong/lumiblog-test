<?php

namespace App\Http\Controllers;

use App\Contracts\CommentInterface;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends BaseController
{
    protected $limit = 28;
    protected $viewIndex = 'admin.comments.index';
    protected $editView = 'admin.comments.edit';
    protected $routeIndex;

    public function __construct(CommentInterface $comment, CommentRequest $request)
    {
        parent::__construct($comment,$request);
        $this->routeIndex = url()->previous();
    }

    public function store()
    {
        $this->request->offsetSet('user_id', auth()->id());
        return parent::store();
    }
}
