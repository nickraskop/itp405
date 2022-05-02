@extends("layouts.main")

@section("content")
  <style>
    #post {
      border-color: #d5d8de;
      border-style: solid;
      border-width: 1px;
      margin-top: 30px;
      margin-bottom: 30px;
      padding: 10px;
      display: flex;
      flex-direction: column;
      width: 50%;
      margin-left: auto;
      margin-right: auto;
    }
    #post img {
      width: 100%;
      height: 100%;
    }
    #user {
      display: flex;
      align-items: center;
    }
    #user img {
      border-radius: 100%;
      width: 35px;
      height: 35px;
      margin-right: 10px;
    }
  </style>
  @foreach($posts as $post)
    <div id="post">
      <div id="user">
        <img src="{{ $post->user->pfp }}" alt="">
        <h3>{{ $post->user->name }}</h3>
      </div>
      <img src="{{ $post->photo }}" alt="">
      <p>{{ $post->caption }}</p>
    </div>
  @endforeach
@endsection