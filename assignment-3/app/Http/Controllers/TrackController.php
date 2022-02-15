<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index() {
        $tracks = DB::table('tracks')
        ->join('albums', 'tracks.album_id', '=', 'albums.id')
        ->join('artists', 'albums.artist_id', '=', 'artists.id')
        ->join('genres', 'tracks.genre_id', '=', 'genres.id')
        ->join('media_types', 'tracks.media_type_id', '=', 'media_types.id')
        ->orderBy('tracks.name')
        ->get([
            'tracks.name AS track',
            'albums.title AS album',
            'artists.name AS artist',
            'genres.name AS genre',
            'media_types.name AS media_type',
            'unit_price AS price' 
        ]);

        return view('track.index', [
            'tracks' => $tracks,
        ]);
    }

    public function create() {
        $tracks = DB::table('tracks')
            ->orderBy('name')
            ->get();
        $albums = DB::table('albums')
            ->orderBy('title')
            ->get();
        $media_types = DB::table('media_types')
            ->orderBy('name')
            ->get();
        $genres = DB::table('genres')
            ->orderBy('name')
            ->get();

        
        return view('track.create', [
            'tracks' => $tracks,
            'albums' => $albums,
            'media_types' => $media_types,
            'genres' => $genres,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:20',
            'album_id' => 'required|exists:tracks,album_id',
            'media_type_id' => 'required|exists:tracks,media_type_id',
            'genre_id' => 'required|exists:tracks,genre_id',
            'unit_price' => 'required|numeric|min:0',
        ]);

        DB::table('tracks')->insert([
            'name' => $request->input('name'),
            'album_id' => $request->input('album_id'),
            'media_type_id' => $request->input('media_type_id'),
            'genre_id' => $request->input('genre_id'),
            'unit_price' => $request->input('unit_price'),
        ]);

        return redirect()
            ->route('track.index')
            ->with('success', "The track {$request->input('name')} was successfully created”,");
    }
}
