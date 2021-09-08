<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\TagInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    protected $tagRepository;

    public function __construct(TagInterface $tag)
    {
        $this->tagRepository = $tag;
    }

    public function index()
    {
        return view('admin.tags.index',['tags' => $this->tagRepository->paginate(32)]);
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(TagRequest $request)
    {
        if(! $this->tagRepository->create($request->all())){
            return redirect()->back()->withInput()->with('info','Something went wrong!');
        }

        return redirect()->route('admin.tag.index')->with('success','Tag Created Successfully');
    }

    public function edit($id)
    {
        return view('admin.tags.edit',['tag' => $this->tagRepository->find($id)]);
    }

    public function update(Request $request, $id)
    {
        if(! $this->tagRepository->update($id,$request->all())){
            return redirect()->back()->withInput()->with('info','Something went wrong!');
        }

        return redirect()->route('admin.tag.index')->with('success','Tag Created Successfully');
    }

    public function destroy($id)
    {
        //
    }
}
