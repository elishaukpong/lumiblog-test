<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class VariantCompositionController extends Controller
{
    public function create()
    {
        return view('admin.composition.create');
    }
}
