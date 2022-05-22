<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('admin.posts', [
            'posts' => Post::latest()->with(['user', 'category', 'comments', 'likes', 'unLikes'])->get(),
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = new Post;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->user_id = auth()->user()->id;
        $post->save();

        return back();
    }

    public function show(Post $post)
    {
        $categories = Category::all()->where('id', '!=', $post->category_id);
        $post = Post::with(['user', 'category'])->find($post->id);
        return view('admin.show', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    public function update(Post $post, Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
        $post->category_id = $request->category_id;
        $post->update([
            'body' => $request->body,
        ]);

        return redirect()->route('admin.posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
