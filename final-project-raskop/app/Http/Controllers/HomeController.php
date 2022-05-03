<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Auth;
use Gate;

class HomeController extends Controller
{
    public function index()
    {
      $authcheck = Auth::check();
      if (Gate::denies('view-profile', $authcheck)) {
        abort(403);
      }
      $posts = Post::orderBy('created_at', 'desc')->get();
      return view('home.index', [
        'posts' => $posts,
      ]);
    }
}