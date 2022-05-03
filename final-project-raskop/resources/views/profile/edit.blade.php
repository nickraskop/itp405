@extends("layouts.main")

@section('title', 'Edit Profile')

@section("content")
  @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
      @csrf
      <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">
          @error('name')
            <small class="text-danger">{{$message}}</small>
          @enderror
      </div>
      <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
          @error('email')
            <small class="text-danger">{{$message}}</small>
          @enderror
      </div>
      <div class="mb-3">
          <label for="bio" class="form-label">Bio</label>
          <input type="text" name="bio" id="bio" class="form-control" value="{{ old('bio', $user->bio) }}">
          @error('bio')
            <small class="text-danger">{{$message}}</small>
          @enderror
      </div>
      <div class="mb-3">
          <label for="location" class="form-label">Bio</label>
          <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $user->location) }}">
          @error('location')
            <small class="text-danger">{{$message}}</small>
          @enderror
      </div>
      </div>
      <button type="submit" class="btn btn-primary">
        Save
      </button>
    </form>
@endsection