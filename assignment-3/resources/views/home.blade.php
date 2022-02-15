@extends("layouts.main")

@section("title", "Home")

@section("content")
  <div>
    <div class="mb-3 text-end">
      <a href="{{ route('track.create') }}">New Track</a>
    </div>
    <a href="/playlists"><h1>Playlists</h1></a>
    <a href="/tracks"><h1>Tracks</h1></a>
    <a href="/tracks/new"><h2>New Track</h2></a>
  </div>
@endsection