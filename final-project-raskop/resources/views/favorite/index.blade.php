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
  @foreach($favorites as $favorite)
    <div id="post">
      <a href="{{ route('profile.show', [ 'id' => $favorite->user->id ]) }}">
        <div id="user">
          <img src="{{ $favorite->user->pfp }}" alt="">
          <h3>{{ $favorite->user->name }}</h3>
          @if (Auth::check() && Auth::user()->id === $favorite->user->id)
          @elseif (Auth::check() && Auth::user()->following->where('id', '=', $favorite->user->id)->first() === null)
          <form action="{{ route('follow.follow', [ 'id' => $favorite->user->id ]) }}" method="post">
            @csrf
            <button type="submit">Follow</button>
          </form>
          @else
            <p>Following</p>
          @endif
        </div>
      </a>
      <img src="{{ $favorite->photo }}" alt="">
      <p>{{ $favorite->caption }}</p>
      <form action="{{ route('favorite.favorite', [ 'id' => $favorite->id ]) }}" method="post">
        @csrf
        <button type="submit">Favorite</button>
      </form>
    </div>
  @endforeach
@endsection