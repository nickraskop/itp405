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

}
