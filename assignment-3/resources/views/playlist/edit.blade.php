@extends("layouts.main")

@section("title", "Edit Playlist Name")

@section("content")
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Home</a>
  </nav>

  <form action="{{ route('playlist.update', [ 'id' => $playlist->id ]) }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" id="name" name="name" value="{{ old('name', $playlist->name) }}"">
    </div>
    @error("name")
      <small class="text-danger">{{$message}}</small>
    @enderror
    <button type="submit">Save</button>
  </form>
@endsection