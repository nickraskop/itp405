@extends("layouts.main")

@section("title", "New Track")

@section("content")
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Home</a>
  </nav>
  <form method="POST" action="{{ route('track.store') }}">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">name</label>
      <input type="text" id="name" name="name" value="{{ old('name') }}">
      @error("name")
        <small class="text-danger">{{$message}}</small>
      @enderror
    </div>

    <div class="mb-3">
      <label for="album_id" class="form-label">Album</label>
      <select name="album_id" id="album_id">
        <option value="">-- Select Album --</option>

        @foreach ($albums as $album)
          <option value="{{$album->id}}" {{ (string) $album->id === (string) old('album_id') ? "selected" : ""}}>
            {{ $album->title }}
          </option>
        @endforeach
      </select>
      @error("album_id")
        <small class="text-danger">{{$message}}</small>
      @enderror
    </div>

    <div class="mb-3">
      <label for="media_type_id" class="form-label">Media Type</label>
      <select name="media_type_id" id="media_type_id">
        <option value="">-- Select Media Type --</option>

        @foreach ($media_types as $media_type)
          <option value="{{$media_type->id}}" {{ (string) $media_type->id === (string) old('media_type_id') ? "selected" : ""}}>
            {{ $media_type->name }}
          </option>
        @endforeach
      </select>
      @error("media_type_id")
        <small class="text-danger">{{$message}}</small>
      @enderror
    </div>

    <div class="mb-3">
      <label for="genre_id" class="form-label">Genre</label>
      <select name="genre_id" id="genre_id">
        <option value="">-- Select Genre --</option>

        @foreach ($genres as $genre)
          <option value="{{$genre->id}}" {{ (string) $genre->id === (string) old('genre_id') ? "selected" : ""}}>
            {{ $genre->name }}
          </option>
        @endforeach
      </select>
      @error("genre_id")
        <small class="text-danger">{{$message}}</small>
      @enderror
    </div>

    <div class="mb-3">
      <label for="unit_price" class="form-label">Price</label>
      <input type="number" id="unit_price" name="unit_price" value="{{ old('unit_price') }}">
      @error("unit_price")
        <small class="text-danger">{{$message}}</small>
      @enderror
    </div>

    <button type="submit">Save</button>
  </form>

@endsection