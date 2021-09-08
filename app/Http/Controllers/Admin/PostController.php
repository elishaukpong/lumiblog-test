<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\PostInterface;
use App\Contracts\TagInterface;
use App\Http\Controllers\BaseController;
use App\Http\Requests\PostRequest;

class PostController extends BaseController
{

    protected $limit = 12;
    protected $viewIndex = 'admin.posts.index';
    protected $editView = 'admin.posts.edit';
    protected $createView = 'admin.posts.create';
    protected $showView = 'admin.posts.show';
    protected $routeIndex;

    public function __construct(PostInterface $post, PostRequest $request, TagInterface $tag)
    {
        parent::__construct($post,$request);

        $this->params['tags'] = $tag->get();

        if($request->method() === 'PUT'){
            $this->routeIndex = route('admin.post.show',request()->segment(3));
        }else{
            $this->routeIndex = route('admin.post.index');
        }
    }

}
