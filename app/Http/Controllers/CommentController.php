<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $post = Post::find($request->post_id);
        $post->comments()->create([
            'body' => $request->body,
            'user_id' => auth()->user()->id,
        ]);

        return back();
    }
}
