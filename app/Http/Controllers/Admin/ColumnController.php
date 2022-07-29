<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColumnRequest;
use App\Models\Column;
use App\Models\Url;

class ColumnController extends Controller
{
    public function create()
    {
        return view('admin.columns.create',['urls' => Url::get()]);
    }

    public function show($id)
    {
        return view('admin.columns.show', ['entity' => Column::findOrFail($id)]);
    }

    public function store(ColumnRequest $request)
    {
        Column::create($request->validated());

        return redirect()->route('admin.path.show',$request->url_id);
    }
}
