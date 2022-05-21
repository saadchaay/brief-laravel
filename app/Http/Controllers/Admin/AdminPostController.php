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
        return view('admin.index', [
            'posts' => Post::latest()->with(['user', 'category', 'comments', 'likes', 'unLikes'])->get(),
            'categories' => Category::all(),
        ]);
    }
}
