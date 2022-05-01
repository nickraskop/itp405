@extends("layouts.main")

@section("content")
  <style>
    #content {
      display: flex;
      justify-content: space-around;
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
    #username {
      margin-right: 10px;
    }
    #bio {
      text-align: left;
      color: grey;
      font-weight: 500;
    }
    #location {
      text-align: left;
    }
    #pics {
      margin-top: 50px;
      display: flex;
      justify-content: center;
      width: 600px;
      flex-wrap: wrap;
    }
    #pics img {
      width: 200px;
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

  </style>
  <div id="content">
    <div id="left">
      <div id="heading">
        <div id="pfp">
          <img src="https://ychef.files.bbci.co.uk/976x549/p07ryyyj.jpg" />
        </div>
        <div id="info">
          <div id="userEdit">
            <h1 id="username">{{ $user->name }}</h1> 
            <button>Edit Profile</button>
          </div>
          <div id="stats">
            <p><b>1</b> Posts</p>
            <p><b>1</b> Followers</p>
            <p><b>1</b> Following</p>
          </div>
          <div id="sub">
            <div id="sub2">
              <div id="location">
                <p>California, USA</p>
                <p>Joined on {{ $user->created_at }}</p>
              </div>
            </div>
            <a href="{{ route('post.create') }}"><img src="{{ url('storage/assets/flower_upload.jpg') }}" alt=""></a>
          </div>
        </div>
      </div>
      <div id="bio"><p>Beats, bears, battlestar galactica.</p></div>
      <div id="pics">
        @foreach ($pics as $pic)
          <div id="pic">
            <a href="{{ route('post.show', ['id' => $pic->id ]) }}"><img src="{{ url('storage/posts/'.$pic->file_path) }}" alt=""><a>
          </div>
        @endforeach   
      </div>
    </div>
    <div id="right">
      <div id="about">
        <h1>About my Garden</h1>
      </div>
    </div>
  </div>
@endsection