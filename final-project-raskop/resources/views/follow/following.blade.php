@extends('layouts.main')

@section('title', 'Following')

@section('content')
  @foreach($followings as $following)
    <p>{{ $following->name }}</p>
  @endforeach
@endsection