@extends("layouts.main")

@section('title', 'edit profile')

@section("content")
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <h2>Comment</h2>
    <form action="{{ route('comment.update', [ 'id' => $id]) }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="body" class="form-label"></label>
          <input type="text" name="body" id="body" class="form-control" value="{{ old('body') }}">
          @error("body")
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">
          Edit comment
        </button>
      </form>
@endsection