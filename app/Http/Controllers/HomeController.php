<?php

namespace App\Http\Controllers;

use App\Contracts\PostInterface;
use Illuminate\Http\Request;

class HomeController extends BaseController
{

    protected $limit = 12;
    protected $viewIndex = 'welcome';
    protected $editView = 'admin.posts.edit';
    protected $createView = 'admin.posts.create';
    protected $showView = 'posts.show';
    protected $routeIndex;

    public function __construct(PostInterface $post, Request $request)
    {
        parent::__construct($post,$request);
    }

    public function index()
    {
        return view($this->viewIndex,['posts' => $this->interface->builder()->limit(3)->get()]);
    }

    public function posts()
    {
        $this->viewIndex = 'posts.index';
        return parent::index();
    }

    public function suggest()
    {
        return $this->interface->filter($this->request->toArray())
                                ->latest()->limit(5)->get()
                                ->toJson();
    }
}
