<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    
    public function index()
    {
        return view('admin.users', [
            'users' => User::latest()->with(['posts', 'comments', 'likes', 'unLikes'])->get(),
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
