<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'newPassword' => 'required|max:255|min:6',
            'confirmPassword' => 'required|max:255|min:6',
        ]);

        // $getUser = User::find(auth()->user()->id);
        if(Hash::check($request->oldPassword, $user->password)) {
            if($request->newPassword == $request->confirmPassword) {
                $user->update([
                    'password' => Hash::make($request->newPassword),
                ]);
                return back();
            } else {
                return back()->withErrors(['confirmPassword' => 'New password and confirm password does not match']);
            }
        } else {
            return back()->withErrors(['oldPassword' => 'Old password does not match']);
        }
    }
}
