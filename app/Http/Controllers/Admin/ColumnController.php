<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColumnRequest;
use App\Models\Column;
use App\Models\Url;

class ColumnController extends Controller
{
    public function create(Url $path)
    {
        return view('admin.columns.create',['path' => $path]);
    }

    public function store(ColumnRequest $request)
    {
        Column::create($request->validated());

        return redirect()->route('admin.path.show',$request->url_id);
    }
}
