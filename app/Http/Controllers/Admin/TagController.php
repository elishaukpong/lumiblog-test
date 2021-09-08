<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\TagInterface;
use App\Http\Controllers\BaseController;
use App\Http\Requests\TagRequest;

class TagController extends BaseController
{
    protected $limit = 16;
    protected $viewIndex = 'admin.tags.index';
    protected $editView = 'admin.tags.edit';
    protected $createView = 'admin.tags.create';
    protected $routeIndex;

    public function __construct(TagInterface $tag, TagRequest $request)
    {
        parent::__construct($tag,$request);
        $this->routeIndex = route('admin.tag.index');
    }
}
