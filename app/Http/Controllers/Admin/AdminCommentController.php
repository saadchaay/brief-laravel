<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;

class AdminCommentController extends Controller
{
    public function index(Post $post)
    {
        return view('admin.comments', [
            'comments' => $post->comments,
        ]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
