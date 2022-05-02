<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\UserUser;
use Auth;

class PostController extends Controller
{
    public function create()
    {
      return view('post.create');
    }

    public function store(Request $request)
    {
      $post = new Post();
      $post->caption = $request->get('caption');
      $post->photo = $request->get('photo');
      $post->user_id = Auth::user()->id;
      $post->save();

      $stuff = new UserUser();
      $stuff->follower_id = Auth::user()->id;
      $stuff->following_id = 3;
      $stuff->save();

      return redirect()
        ->route('profile.index');
    }

    public function show($id)
    {
      $post = Post::all()->where('id', '=', $id)->first();
      return view('post.show', [
        'post' => $post,
        'user' => Auth::user(),
      ]);
    }
}