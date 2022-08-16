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
        $data = $request->validated();

        VariantComposition::create([
            'url_id' => $path,
            'name' => $data['name'],
            'composition' => json_encode($data['composition'])
        ]);

        return redirect()->route('admin.path.show', $path);
    }

    public function show(Url $path, VariantComposition $composition)
    {
        return view('admin.composition.show' ,['path' => $path, 'entity' => $composition]);
    }
}
