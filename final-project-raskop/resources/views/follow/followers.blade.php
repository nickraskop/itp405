@extends('layouts.main')

@section('title', 'Followers')

@section('content')
  <style>
    a {
      text-decoration: none;
      color: black;
    }
  </style>
  @foreach($followers as $follower)
    <a href="{{ route('profile.show', [ 'id' => $follower->id ]) }}"><h4>{{ $follower->name }}</h4><a>
  @endforeach
@endsection