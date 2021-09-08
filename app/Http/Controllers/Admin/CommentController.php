<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CommentInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

/**
 *
 */
class CommentController extends Controller
{

    protected $commentRepository;

    public function __construct(CommentInterface $comment)
    {
        $this->commentRepository = $comment;
    }

    public function index()
    {
        return view('admin.comments.index',['comments' => $this->commentRepository->paginate(40)]);
    }

    public function edit($id)
    {
        return view('admin.comments.edit',['comment'=> $this->commentRepository->findOrFail($id)]);
    }

    public function update(CommentRequest $request, $id)
    {
        if(! $this->commentRepository->update($id,$request->except(['_method','_token', 'url']))){
            return redirect()->back()->withInput()->with('info','Something went wrong!');
        }

        return redirect()->to($request->url)->with('success','Comment Updated Successfully');
    }

    public function destroy($id)
    {
        //
    }
}
