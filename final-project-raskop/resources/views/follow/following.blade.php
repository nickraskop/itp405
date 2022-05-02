@extends('layouts.main')

@section('title', 'Following')

@section('content')
  <style>
    a {
      text-decoration: none;
      color: black;
    }
  </style>
  @foreach($followings as $following)
  <a href="{{ route('profile.show', [ 'id' => $following->id ]) }}"><h4>{{ $following->name }}</h4><a>
  @endforeach
@endsection