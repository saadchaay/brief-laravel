<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Post;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'user']);
    }

    public function store(Post $post)
    {
        if($post->likedBy(auth()->user())) {
            $post->likes()->where('user_id', auth()->user()->id)->delete();
        } else {
            $post->unLikes()->where('user_id', auth()->user()->id)->delete();
            $post->likes()->create([    
                'user_id' => auth()->user()->id,
            ]);
        }
        return back();
    }

    public function destroy(Post $post)
    {
        $post->likes()->where('user_id', auth()->user()->id)->delete();

        return back();
    }
    
}
