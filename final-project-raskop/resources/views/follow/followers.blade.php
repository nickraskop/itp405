@extends('layouts.main')

@section('title', 'Followers')

@section('content')
  @foreach($followers as $follower)
    <p>{{ $follower->name }}</p>
  @endforeach
@endsection