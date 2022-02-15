@extends("layouts.main")

@section("title", "Playlists")

@section("content")
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Home</a>
  </nav>

  @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
  @endif


  @foreach($playlists as $playlist)
    <p><a href="{{ route('playlist.show', [ 'id' => $playlist->id ]) }}">{{$playlist->name}}</a> <a href="{{ route('playlist.edit', [ 'id' => $playlist->id ]) }}">Rename</a></p>
    
  @endforeach
  
  
@endsection