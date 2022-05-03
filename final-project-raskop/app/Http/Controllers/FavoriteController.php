<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPost;
use Hash;
use Auth;

class FavoriteController extends Controller
{
    public function favorite($id)
    {
      $user = Auth::user();

      $favorite = new UserPost();
      $favorite->user_id = $user->id;
      $favorite->post_id = $id;
      $favorite->save();

      return redirect()
        ->route('home.index')->with('success', "Succesfully favorited");
    }

    public function index()
    {
      $favorites = Auth::user()->favorites->sortBy('created_at');


      return view('favorite.index', [
        'favorites' => $favorites,
      ]);
    }

    public function unfavorite($id)
    {
      UserPost::where('user_id', '=', Auth::user()->id)
        ->where('post_id', '=', $id)
        ->first()
        ->delete();
      return redirect()
        ->route('home.index')->with('success', "Successfully unfavorited");
    }

}
