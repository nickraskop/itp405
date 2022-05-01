<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>@yield("title")</title>
</head>
<style>
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    #logoutButton {
      background-color: #333;
      border-width: 0;
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    #logoutButton:hover {
      background-color: #111;
      color: #4658db;

    }

    /* Change the link color to #111 (black) on hover */
    li a:hover {
      background-color: #111;
    }



</style>
<body>
    <ul>
      <li><a href="/">Home</a></li>
      @if (Auth::check())
        <li><a href="{{ route('profile.index') }}">Profile</a></li>
        <li>
          <form method="post" action="{{ route('auth.logout') }}">
            @csrf
            <button id="logoutButton" type="submit">Logout</button>
          </form>
        </li>
      @else
          <li><a href="{{ route('registration.index') }}">Register</a></li>
          <li><a href="{{ route('login') }}">Login</a></li>
      @endif
    </ul>
    <main>
      @if (session('error'))
          <div class="alert alert-danger" role="alert">
              {{ session('error') }}
          </div>
      @endif
      @yield("content")
    </main>
</body>
</html>