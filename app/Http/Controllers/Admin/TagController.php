<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\TagInterface;
use App\Http\Controllers\BaseController;
use App\Http\Requests\TagRequest;
use Illuminate\Http\Request;

class TagController extends BaseController
{

    protected $viewIndex = 'admin.tags.index';
    protected $editView = 'admin.tags.edit';
    protected $routeIndex;

    public function __construct(TagInterface $tag, Request $request)
    {
        parent::__construct($tag,$request);
    }


//    public function create()
//    {
//        return view('admin.tags.create');
//    }
//
//    public function store(TagRequest $request)
//    {
//        if(! $this->tagRepository->create($request->all())){
//            return redirect()->back()->withInput()->with('info','Something went wrong!');
//        }
//
//        return redirect()->route('admin.tag.index')->with('success','Tag Created Successfully');
//    }
//
//    public function edit($id)
//    {
//        return view('admin.tags.edit',['tag' => $this->tagRepository->find($id)]);
//    }
//
//    public function update(Request $request, $id)
//    {
//        if(! $this->tagRepository->update($id,$request->all())){
//            return redirect()->back()->withInput()->with('info','Something went wrong!');
//        }
//
//        return redirect()->route('admin.tag.index')->with('success','Tag Created Successfully');
//    }
//
//    public function destroy($id)
//    {
//        //
//    }
}
