<?php

namespace App\Http\Controllers;

use App\Contracts\CommentInterface;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentRepository;

    public function __construct(CommentInterface $comment)
    {
        $this->commentRepository = $comment;
    }

    public function store(CommentRequest $request)
    {
        if(! $this->commentRepository->create([
            'user_id' => auth()->id(),
            'text' => $request->text,
            'post_id' => $request->post_id
        ])){
            return redirect()->back()->withInput()->with('info','Something went wrong!');
        }

        return redirect()->back()->with('success','Comment Updated Successfully');

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
