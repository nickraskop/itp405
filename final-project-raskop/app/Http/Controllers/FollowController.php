<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class FollowController extends Controller
{
    // public function index()
    // {
    //     return view('auth.register');
    // }

    // public function register(Request $request)
    // {
    //     $user = new User();
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');
    //     $user->pfp = $request->input('pfp');
    //     $user->password = Hash::make($request->input('password')); // Encrypt our password using bcrypt
    //     $user->save();

    //     Auth::login($user);
    //     return redirect()->route('profile.index');
    // }

    public function followers()
    {
      $user = Auth::user();
      $followers = $user->followers;

      return view('follow.followers', [
        'followers' => $followers,
      ]);
    }

    public function following()
    {
      $user = Auth::user();
      $following = $user->following;

      return view('follow.following', [
        'followings' => $following,
      ]);
    }
}
