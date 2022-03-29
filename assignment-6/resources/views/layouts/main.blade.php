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

    /* Change the link color to #111 (black) on hover */
    li a:hover {
      background-color: #111;
    }
</style>
<body>
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/secret/">Secret</a></li>
      <li><a href="/test/">Test</a></li>
      <li><a href="/maintenance/">Maintenance</a></li>
    </ul>
    @yield("content")
</body>
</html>