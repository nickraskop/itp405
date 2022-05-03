<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserUser;
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

    public function followers($id)
    {
      $user = User::where('id', '=', $id)->first();
      $followers = $user->followers;

      return view('follow.followers', [
        'followers' => $followers,
      ]);
    }

    public function following($id)
    {
      $user = User::where('id', '=', $id)->first();
      $following = $user->following;

      return view('follow.following', [
        'followings' => $following,
      ]);
    }

    public function follow($id)
    {
      $follower = Auth::user();

      $follow = new UserUser();
      $follow->follower_id = $follower->id;
      $follow->following_id = $id;
      $follow->save();

      return redirect()
        ->route('home.index')->with('success', "Succesfully followed");
    }

    public function followFromProfile($id)
    {
      $follower = Auth::user();

      $follow = new UserUser();
      $follow->follower_id = $follower->id;
      $follow->following_id = $id;
      $follow->save();

      return redirect()
        ->route('profile.show', ['id' => $id])->with('success', "Succesfully followed");
    }

    public function unfollow($id, $from)
    {
      UserUser::where('follower_id', '=', Auth::user()->id)
        ->where('following_id', '=', $id)
        ->first()
        ->delete();
      if($from === 'profile') {
        return redirect()
          ->route('profile.show', ['id' => $id])->with('success', "Successfully unfollowed");
      }
      else {
        return redirect()
          ->route('home.index')->with('success', "Successfully unfollowed");
      }
    }
}
