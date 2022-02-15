@extends("layouts.main")

@section("title", "Playlists")

@section("content")
  @foreach($playlists as $playlist)
    <p><a href="{{ route('playlist.show', [ 'id' => $playlist->id ]) }}">{{$playlist->name}}</a></p>
  @endforeach
@endsection