<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\PostInterface;
use App\Contracts\TagInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Repository\TagRepository;

class PostController extends Controller
{

    protected $postRepository;
    /**
     * @var TagRepository
     */
    protected $tagRepository;

    public function __construct(PostInterface $post, TagInterface $tag)
    {
        $this->postRepository = $post;
        $this->tagRepository = $tag;
    }

    public function index()
    {
        return view('admin.posts.index',['posts' => $this->postRepository->paginate(12)]);
    }

    public function create()
    {
        return view('admin.posts.create',['tags' => $this->tagRepository->get()]);
    }

    public function store(PostRequest $request)
    {
        if(! $this->postRepository->create($request->all())){
            return redirect()->back()->withInput()->with('info','Something went wrong!');
        }

        return redirect()->route('admin.post.index')->with('success','Post Created');
    }

    public function show($id)
    {
        return view('admin.posts.show',['post' => $this->postRepository->findOrfail($id)]);
    }

    public function edit($id)
    {
        return view('admin.posts.edit',[
            'tags' => $this->tagRepository->get(),
            'post' => $this->postRepository->findOrfail($id)
        ]);
    }

    public function update(PostRequest $request, $id)
    {
         if(! $post = $this->postRepository->update($id,$request->all())){
             return redirect()->back()->withInput()->with('info','Something went wrong!');
         }

        return redirect()->route('admin.post.show',$post->id)->with('success','Post Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
