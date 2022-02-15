@extends("layouts.main")

@section("title")
  Playlists: {{$playlist->name}}
@endsection

@section("content")
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('playlist.index') }}">Back to playlists</a>
  </nav>
  <div><h1>{{$playlist->name}}</h1></div>
  <p>Total Tracks: {{count($playlistItems)}}</p>
  <table class="table">
    <tr>
      <th>Track</th>
      <th>Album</th>
      <th>Artist</th>
      <th>Genre</th>
    </tr>
    @foreach($playlistItems as $playlistItem)
    <tr>
      <td>{{$playlistItem->track}}</td>
      <td>{{$playlistItem->album}}</td>
      <td>{{$playlistItem->artist}}</td>
      <td>{{$playlistItem->genre}}</td>
    </tr>
    @endforeach
  </table>
@endsection