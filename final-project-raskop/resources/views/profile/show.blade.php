@extends("layouts.main")

@section('title')
  Profile - {{ $user->name }}
@endsection
@section("content")
  <style>
    #content {
      display: flex;
      justify-content: center;
      border-color: #d5d8de;
      border-style: solid;
      border-width: 1px;
      width: fit-content;
      margin-left: auto;
      margin-right: auto;
      margin-top: 40px;
      padding: 30px;
    }
    #left {
      display: flex;
      flex-direction: column;
    }
    #right {
    }
    #heading {
      width: fit-content;
      margin-left: 10%;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    #pfp img {
      width: 150px;
      height:150px;
      border-radius: 100%;
      margin-right: 50px;
      margin-top: 30px;
    }
    h1, h2, h3, p {
      padding: 0;
      margin: 0;
    }
    #info {
      padding-top: 10px;
      display: flex;
      flex-direction: column;
    }
    #stats {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }
    #userEdit {
      display: flex;
      margin-bottom: 5px;
    }
    #userEdit a {
      border-color: black;
      border-width: 1px;
      border-style: solid;
      text-decoration: none;
      color: black;
    }
    #userEdit p {
      padding-top: 10px;
    }
    #username {
      margin-right: 10px;
      width: fit-content;
      white-space: nowrap;
      padding: 10px;
    }
    #bio {
      text-align: left;
      color: grey;
      font-weight: 500;
    }
    #location {
      text-align: left;
      width: 250px;
    }
    #pics {
      margin-top: 50px;
      display: flex;
      justify-content: center;
      width: 600px;
      flex-wrap: wrap;
      justify-content: start;
    }
    #pics img {
      width: 200px;
    }
    #pics img:hover {
      opacity: .6;
    }
    #about {

    }
    #newpost {
      margin-left: 20px;
    }
    #sub {
      display: flex;
    }
    #sub img {
      width: 40px;
      height: 40px;
      margin: 10px;
    }
    #sub button {

    }
    #stats a {
      text-decoration: none;
      color: black;
    }
    #follow {
      display: flex;
      width: 220px;
      justify-content: space-between;
    }

  </style>
  <div id="content">
    <div id="left">
      <div id="heading">
        <div id="pfp">
          <img src="{{ $user->pfp }}" />
        </div>
        <div id="info">
          <div id="userEdit">
            <h1 id="username">{{ $user->name }}</h1> 
            @if (Auth::user()->id == $user->id)
              <a href="{{ route('profile.edit') }}"><p>Edit Profile</p></a>
            @else
              @if (Auth::user()->following->where('id', '=', $user->id)->first() === null)
              <form action="{{ route('follow.followFromProfile', [ 'id' => $user->id ]) }}" method="post">
                @csrf
                <button type="submit">Follow</button>
              </form>
              @else
              <form action="{{ route('follow.unfollow', [ 'id' => $user->id, 'from' => 'profile' ]) }}" method="post">
                @csrf
                <button type="submit">Unfollow</button>
              </form>
              @endif
            @endif
          </div>
          <div id="stats">
            <p><b>{{ $numPosts }}</b> Posts</p>
            <a href="{{ route('follow.followers', ['id' => $user->id]) }}"><p><b>{{ $numFollowers }}</b> Followers</p></a>
            <a href="{{ route('follow.following', ['id' => $user->id]) }}"><p><b>{{ $numFollowing }}</b> Following</p></a>
          </div>
          <div id="sub">
            <div id="sub2">
              <div id="location">
                <p>📍  {{ $user->location }}</p>
                <p>📅  Joined on {{ date_format($user->created_at, 'n/j/Y') }}</p>
                <p>👋  {{ $user->bio }}</p>
                <div id="follow">
                  @if (Auth::user()->following->where('id', '=', $user->id)->first() !== null)
                    <p>✔️ Following</p>
                  @endif
                  @if (Auth::user()->followers->where('id', '=', $user->id)->first() !== null)
                    <p>✔️ Follows you</p>
                  @endif
                </div>
              </div>
            </div>
            <a href="{{ route('post.create') }}"><img src="https://ecoloftinsulations.co.uk/wp-content/uploads/2019/10/Healthier-1.png" alt=""></a>
          </div>
        </div>
      </div>
      <div id="pics">
        @foreach ($posts as $post)
          <div id="pic">
            <a href="{{ route('post.show', ['id' => $post->id ]) }}"><img src="{{ $post->photo }}" alt=""><a>
          </div>
        @endforeach   
      </div>
    </div>
  </div>
@endsection