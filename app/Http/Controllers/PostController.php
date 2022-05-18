<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index()
    {
        $posts = Post::latest()->with(['user', 'category'])->get();
        print_r($posts[0]->category->id);
        return view('home', [
            'posts' => $posts,
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $request->user()->posts()->create([
            'body' => $request->body,
            'category_id' => $request->category,
        ]);

        return back();
    }
}
