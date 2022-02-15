<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index() {
        $playlists = DB::table('playlists')
        ->orderBy('name')
        ->get([
            'playlists.name',
            'playlists.id'
        ]);

        return view('playlist.index', [
            'playlists' => $playlists,
        ]);
    }

    public function show($id) {
        $playlist = DB::table('playlists')
            ->where('id', '=', $id)
            ->first();

        $playlistItems = DB::table('playlist_track')
            ->where('playlist_id', '=', $id)
            ->join('tracks', 'tracks.id', '=', 'playlist_track.track_id')
            ->join('albums', 'tracks.album_id', '=', 'albums.id')
            ->join('artists', 'albums.artist_id', '=', 'artists.id')
            ->join('genres', 'tracks.genre_id', '=', 'genres.id')
            ->get([
                'tracks.name AS track',
                'albums.title AS album',
                'artists.name AS artist',
                'genres.name AS genre',
            ]);
        return view('playlist.show', [
            'playlist' => $playlist,
            'playlistItems' => $playlistItems,
        ]);
    }

    public function edit($id) {
        $playlist = DB::table('playlists')
            ->where('id', '=', $id)
            ->first();

        return view('playlist.edit', [
            'playlist' => $playlist,
        ]);
    }

    public function update($id, Request $request) {
        $oldname = DB::table('playlists')
        ->where('id', '=', $id)
        ->first();


        $request->validate([
            'name' => 'required|max:30|unique:playlists,name',
        ]);

        DB::table('playlists')->where('id', '=', $id)->update([
            'name' => $request->input('name')
        ]);

        return redirect()
            ->route('playlist.index', ['id' => $id])
            ->with('success', "{$oldname->name} was successfully renamed to {$request->input('name')}");
    }
}
