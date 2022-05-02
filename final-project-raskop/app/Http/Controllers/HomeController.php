<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
      $posts = Post::orderBy('created_at', 'desc')->get();
      return view('home.index', [
        'posts' => $posts,
      ]);
    }
}