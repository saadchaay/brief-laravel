<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;

class AdminCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index(Post $post)
    {
        return view('admin.comments', [
            'comments' => $post->comments,
            'post' => $post,
        ]);
    }

    /* public function store(Post $post, Request $request){
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $comment = new Comment;
        $comment->body = $request->comment;
        $comment->post_id = $post->id;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        return back();
    } */

    public function show()
    {
        $comments = Comment::latest()->with(['user', 'post'])->get();
        return view('admin.comments', [
            'comments' => $comments,
        ]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
