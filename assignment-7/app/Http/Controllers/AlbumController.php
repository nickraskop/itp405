<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Artist;
use App\Models\Album;
use Auth;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::with(['artist', 'user'])->get();

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

        $user = Auth::user();
        // Insert album with eloquent
        $album = new Album();
        $album->title = $request->input('title');
        $album->artist_id = $request->input('artist');
        $album->user_id = $user->id;
        $album->save();



        $artist = Artist::where('id', '=', $request->input('artist'))->first();

        return redirect()
            ->route('album.index')
            ->with('success', "Successfully created {$artist->name} - {$request->input('title')}");
    }

    public function edit($id)
    {
        $album = Album::where('id', '=', $id)->first();
        if (Gate::denies('edit-album', $album)) {
            abort(403); // 403 Not Authorized
        }


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

        if (Gate::denies('edit-album', $album)) {
            abort(403); // 403 Not Authorized
        }

        $album->title = $request->input('title');
        $album->artist_id = $request->input('artist');
        $album->save();

        $artist = Artist::where('id', '=', $request->input('artist'))->first();

        return redirect()
            ->route('album.edit', [ 'id' => $id ])
            ->with('success', "Successfully updated {$artist->name} - {$request->input('title')}");
    }
}