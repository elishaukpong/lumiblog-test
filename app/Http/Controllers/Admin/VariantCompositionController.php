<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VariantCompositionRequest;
use App\Models\Url;
use App\Models\VariantComposition;

class VariantCompositionController extends Controller
{
    public function create($path)
    {
        $pathModel = Url::with('columns')->findOrFail($path);
        return view('admin.composition.create', compact('pathModel'));
    }

    public function store(VariantCompositionRequest $request, $path)
    {
        return VariantComposition::create([
            'url_id' => $path,
            'composition' => json_encode($request->validated()['composition'])
        ]);
    }
}
