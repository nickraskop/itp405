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
    #post a {
      text-decoration: none;
      color: black;
    }
  </style>
  @foreach($posts as $post)
    <div id="post">
      <a href="{{ route('profile.show', [ 'id' => $post->user->id ]) }}">
        <div id="user">
          <img src="{{ $post->user->pfp }}" alt="">
          <h3>{{ $post->user->name }}</h3>
          @if (Auth::user()->id === $post->user->id)
          @elseif (Auth::user()->following->where('id', '=', $post->user->id)->first() === null)
          <form action="{{ route('follow.follow', [ 'id' => $post->user->id ]) }}" method="post">
            @csrf
            <button type="submit">Follow</button>
          </form>
          @else
            <p>Following</p>
          @endif
        </div>
      </a>
      <img src="{{ $post->photo }}" alt="">
      <p>{{ $post->caption }}</p>
    </div>
  @endforeach
@endsection