<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Auth;

class PostController extends Controller
{
    public function create()
    {
      return view('post.create');
    }

    public function store(Request $request)
    {
      // Validate the inputs
      $request->validate([
      ]);

      // ensure the request has a file before we attempt anything else.
      if ($request->hasFile('file')) {

        $request->validate([
          'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
        ]);

        // Save the file locally in the storage/profilePic/ folder under a new folder named /profilePic
        // $request->file->store('profilePic', 'public');
        $request->file('file')->store('public/posts/');

        // Store the record, using the new file hashname which will be it's new filename identity.
        $pfp = new Post();
        $pfp->caption = $request->get('caption');
        $pfp->file_path = $request->file->hashName();
        $pfp->user_id = Auth::user()->id;
        $pfp->save(); // Finally, save the record.
      }

      return redirect()
        ->route('profile.index');
    }

    public function show($id)
    {
      $post = Post::all()->where('id', '=', $id)->first();
      return view('post.show', [
        'post' => $post,
      ]);
    }
}