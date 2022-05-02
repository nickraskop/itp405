@extends("layouts.main")

@section("content")
  <style>
    
    #content {
      display: flex;
    }
    #post {
      width: 50%;
      /* height: 70vh; */
      padding: 50px;
    }
    #post h5 {
      margin-left: 65px;
    }
    #postphoto {
      height: 70vh;
    }
    #comments {
      width: 50%;
      padding: 50px;
      margin-right: 20%;
    }
    #comments p {
      font-size: 12px;
    }
    #namecomment {
      display: flex;
      margin-top: 20px;
    }
    #namecomment img {
      width: 30px;
      height: 30px;
      border-radius: 100%;
      margin-right: 10px;
    }
    #text {
      font-weight: normal;
    }
    #name {
      margin-right: 10px;
    }
    #pfp {
      width: 50px;
      height: 50px;
      border-radius: 100%;
      margin-right: 15px;
    }
    #head {
      display: flex;
      margin-top: 15px;
    }
  </style>
  <div id="content">
    <div id="post">
      <img id="postphoto" src="{{ $post->photo }}" alt="">
      <div id="head">
        <img id="pfp" src="{{ $post->user->pfp }}" alt="">
        <h2>{{ $post->user->name }}</h5>
      </div>
      <h5>{{ $post->caption }}</h5>
    </div>
    <div id="comments">
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
        <button type="submit" class="btn btn-primary">
          Write a comment
        </button>

        @foreach($post->comments as $comment)
          <div id="namecomment">
            <img src="{{ $comment->user->pfp }}" alt="">
            <h4 id="name">{{ $comment->user->name }}<h4>
            <h4 id="text">{{$comment->body}}</h4>
          </div>
          
          <p>{{date_format($comment->created_at, 'n/j/Y')}} at {{date_format($comment->created_at, 'g:i A')}}</p>
        @endforeach
      </form>
    </div>
  </div>
@endsection