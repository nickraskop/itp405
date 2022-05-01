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
      $pics = Post::all();
      return view('profile.index', [
        'user' => Auth::user(),
        'pics' => $pics,
      ]);
    }
}