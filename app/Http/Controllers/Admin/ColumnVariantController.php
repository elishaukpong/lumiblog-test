<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VariantRequest;
use App\Models\ColumnVariant;

class ColumnVariantController extends Controller
{
    public function store(VariantRequest $request)
    {
        ColumnVariant::create($request->validated());

        return redirect()->back();
    }
}
