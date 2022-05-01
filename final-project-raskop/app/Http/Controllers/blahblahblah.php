<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
