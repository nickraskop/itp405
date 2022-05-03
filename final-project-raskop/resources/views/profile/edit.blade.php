@extends("layouts.main")

@section('title', 'edit profile')

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
          @error('title')
            <small class="text-danger">{{$message}}</small>
          @enderror
      </div>
      <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
          @error('title')
            <small class="text-danger">{{$message}}</small>
          @enderror
      </div>
      <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control">
          @error('title')
            <small class="text-danger">{{$message}}</small>
          @enderror
      </div>
      </div>
      <button type="submit" class="btn btn-primary">
        Save
      </button>
    </form>
@endsection