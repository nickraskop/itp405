@extends("layouts.main")

@section("content")
  <div>
    <img src="{{ url('storage/posts/'.$post->file_path) }}" alt="">
    <p>{{ $post->caption }}</p>
    <h2>Comments</h2>
    @if (count($post->comments) == 0)
            <p>No answers yet! Be the first to answer by using the form below.</p>
    @endif

    <form action="{{ route('comment.store', [ 'id' => $post->id ]) }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="body" class="form-label"></label>
        <input type="text" name="body" id="body" class="form-control" value="{{ old('body') }}">
        @error("body")
          <small class="text-danger">{{$message}}</small>
        @enderror
      </div>

      @foreach($post->comments as $comment)
        <h4>{{$comment->body}}</h4>
        <h6>Posted on {{date_format($comment->created_at, 'n/j/Y')}} at {{date_format($comment->created_at, 'g:i A')}}</h6>
      @endforeach

      <button type="submit" class="btn btn-primary">
        Write a comment
      </button>
    </form>
  </div>
@endsection