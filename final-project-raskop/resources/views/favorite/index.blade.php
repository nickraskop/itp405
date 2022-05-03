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
          <p>Favorited on {{date_format($favorite->pivot->created_at, 'n/j/Y')}} at {{date_format($favorite->pivot->created_at, 'g:i A')}}</p>
        </div>
      </a>
      <a href="{{ route('post.show', ['id' => $favorite->id]) }}"><img src="{{ $favorite->photo }}" alt=""></a>
      <p>{{ $favorite->caption }}</p>
      <form action="{{ route('favorite.unfavorite', [ 'id' => $favorite->id ]) }}" method="post">
        @csrf
        <button type="submit">Unfavorite</button>
      </form>
    </div>
  @endforeach
@endsection