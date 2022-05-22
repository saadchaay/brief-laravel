<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class UnlikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'user']);
    }
    
    public function store(Post $post)
    {
        if($post->unLikedBy(auth()->user())) {
            $post->unLikes()->where('user_id', auth()->user()->id)->delete();
        }  else {
            $post->likes()->where('user_id', auth()->user()->id)->delete();
            $post->unLikes()->create([    
                'user_id' => auth()->user()->id,
            ]);
        }

        return back();
    }

    public function destroy(Post $post)
    {
        $post->unLikes()->where('user_id', auth()->user()->id)->delete();

        return back();
    }
}
