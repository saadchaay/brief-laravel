<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'user']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $post = Post::find($request->post_id);
        $post->comments()->create([
            'body' => $request->comment,
            'user_id' => auth()->user()->id,
        ]);

        return back();
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return back();
    }
}
