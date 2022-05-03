<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->pfp = $request->input('pfp');
        $user->bio = $request->input('bio');
        $user->location = $request->input('location');
        $user->password = Hash::make($request->input('password')); // Encrypt our password using bcrypt
        $user->save();

        Auth::login($user);
        return redirect()->route('profile.show', ['id' => Auth::user()->id]);
    }
}
