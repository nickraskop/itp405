<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::with('artist')->get();


        return view('album.index', [
            'albums' => $albums,
        ]);
    }

    public function create()
    {
        $artists = Artist::orderBy('name')->get();

        return view('album.create', [
            'artists' => $artists,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20',
            'artist' => 'required|exists:artists,id',
        ]);

        // Insert album with eloquent
        $album = new Album();
        $album->title = $request->input('title');
        $album->artist_id = $request->input('artist');
        $album->save();



        $artist = Artist::where('id', '=', $request->input('artist'))->first();

        return redirect()
            ->route('album.index')
            ->with('success', "Successfully created {$artist->name} - {$request->input('title')}");
    }

    public function edit($id)
    {
        $album = Album::where('id', '=', $id)->first();
        $artists = Artist::orderBy('name')->get();

        return view('album.edit', [
            'album' => $album,
            'artists' => $artists,
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required|max:20',
            'artist' => 'required|exists:artists,id',
        ]);

        // Edit album with eloquent
        $album = Album::where('id', '=', $id)->first();
        $album->title = $request->input('title');
        $album->artist_id = $request->input('artist');
        $album->save();

        $artist = Artist::where('id', '=', $request->input('artist'))->first();

        return redirect()
            ->route('album.edit', [ 'id' => $id ])
            ->with('success', "Successfully updated {$artist->name} - {$request->input('title')}");
    }
}