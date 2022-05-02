<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProfilePic;
use App\Models\Post;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
      $user = Auth::user();
      // dd(Auth::user()->followers);
      // $followers = $user->followers->where('follower_id', '=', $user->id);
      $numFollowers = $user->followers->count();
      $followers = $user->followers;
      $following = $user->following;
      $numFollowing = $user->following->count();
      $posts = Post::all()->where('user_id', '=', $user->id);
      $numPosts = DB::table('posts')->where('user_id', '=', $user->id)->count();
      return view('profile.index', [
        'user' => $user,
        'posts' => $posts,
        'numPosts' => $numPosts,
        'numFollowers' => $numFollowers,
        'followers' => $followers,
        'numFollowing' => $numFollowing,
        'following' => $following,
      ]);
    }
}