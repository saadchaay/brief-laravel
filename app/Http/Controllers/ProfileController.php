<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/[0-9]{10}/',
        ]);

        if(auth()->user()) {
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            return back();
        } else {
            return redirect()->route('login');
        }
    }

    public function edit(User $user, Request $request)
    {
        $this->validate(request(), [
            'oldPassword' => 'required|max:255|min:6',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);
    }
}
