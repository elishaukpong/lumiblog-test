<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UrlRequest;
use App\Models\Url;

class UrlController extends Controller
{
    public function index()
    {
        return view('admin.paths.index', ['entities' => Url::paginate(25)]);
    }

    public function create()
    {
        return view('admin.paths.create');
    }

    public function show($id)
    {
        return view('admin.paths.show', ['entity' => Url::findOrFail($id)]);
    }

    public function store(UrlRequest $request)
    {
        Url::create($request->validated());

        return redirect()->route('admin.path.index');
    }
}
