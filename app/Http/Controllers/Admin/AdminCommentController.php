<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;

class AdminCommentController extends Controller
{
    public function __construct()
    {
        if(auth()->user()->role != 'admin') {
            abort(404);
        }
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

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
