@extends("layouts.main")

@section("title")
    Edit Album: {{ $album->title }}
@endsection

@section("content")
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('album.update', [ 'id' => $album->id ]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $album->title) }}">
            @error('title')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="artist" class="form-label">Artist</label>
            <select name="artist" id="artist" class="form-select">
                <option value="">-- Select Artist --</option>
                @foreach($artists as $artist)
                    <option
                        value="{{$artist->id}}"
                        {{ (string) $artist->id === (string) old('artist', $album->artist_id) ? "selected" : "" }}
                    >
                        {{$artist->name}}
                    </option>
                @endforeach
            </select>
            @error('artist')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            Save
        </button>
    </form>
@endsection