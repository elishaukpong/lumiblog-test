<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\PostInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Repository\TagRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{

    protected $postRepository;
    /**
     * @var TagRepository
     */
    protected $tagRepository;

    public function __construct(PostInterface $postRepository, TagRepository $tagRepository)
    {
        $this->postRepository = $postRepository;
        $this->tagRepository = $tagRepository;
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
