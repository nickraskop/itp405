@extends('layouts.main')

@section('title', 'Register')

@section('content')
    <p>Already have an account? Please <a href="{{ route('login') }}">login</a>.</p>
    <form method="post" action="{{ route('registration.create') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="bio">Bio</label>
            <input type="text" id="bio" name="bio" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="location">Location</label>
            <input type="text" id="location" name="location" class="form-control">
        </div>
        <p>Profile Picture</p>
        <input type="hidden" name="pfp" id="pfp" class="simple-file-upload">
        <br>
        <input type="submit" value="Register" class="btn btn-primary">
    </form>
@endsection