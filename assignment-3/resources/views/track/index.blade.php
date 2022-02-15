@extends("layouts.main")

@section("title", "Tracks")

@section("content")
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Back Home</a>
  </nav>

  @if (session('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif

  
  <table class="table">
    <tr>
      <th>Track</th>
      <th>Album</th>
      <th>Artist</th>
      <th>Genre</th>
      <th>Media Type</th>
      <th>Unit Price</th>
    </tr>
    @foreach($tracks as $track)
    <tr>
      <td>{{$track->track}}</td>
      <td>{{$track->album}}</td>
      <td>{{$track->artist}}</td>
      <td>{{$track->genre}}</td>
      <td>{{$track->media_type}}</td>
      <td>${{$track->price}}</td>
    </tr>
    @endforeach
  </table>
@endsection