<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProfilePic;
use App\Models\Post;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Support\Facades\Gate;

class ProfileController extends Controller
{
    public function show($id)
    {
      $authcheck = Auth::check();
      if (Gate::denies('view-profile', $authcheck)) {
        abort(403);
      }
      $user = User::where('id', '=', $id)->first();
      $numFollowers = $user->followers->count();
      $followers = $user->followers;
      $following = $user->following;
      $numFollowing = $user->following->count();
      $posts = Post::where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->get();
      $numPosts = DB::table('posts')->where('user_id', '=', $user->id)->count();
      return view('profile.show', [
        'user' => $user,
        'posts' => $posts,
        'numPosts' => $numPosts,
        'numFollowers' => $numFollowers,
        'followers' => $followers,
        'numFollowing' => $numFollowing,
        'following' => $following,
      ]);
    }

    public function edit()
    {
      return view('profile.edit', [
        'user' => Auth::user(),
      ]);
    }

    public function update(Request $request)
    {

      $request->validate([
        'name' => 'required|min:5|max:18',
        'email' => 'required|min:5|max:18',
        'bio' => 'required|min:5|max:18',
        'location' => 'required|min:2|max:18',
      ]);


      User::where('id', '=', Auth::user()->id)->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'bio' => $request->input('bio'),
        'location' => $request->input('location'),
      ]);



      return redirect()
        ->route('profile.show', ['id' => Auth::user()->id])->with('success', "Successfully edited profile");
    }
}