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
