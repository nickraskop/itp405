@extends("layouts.main")

@section("content")
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
      <!-- Add CSRF Token -->
      @csrf
    <div class="form-group">
      <input type="file" name="file" required>
    </div>
    <div class="form-group">
      <label>Caption</label>
      <input type="text" class="form-control" name="caption" required>
    </div>
    <button type="submit">Submit</button>
  </form>
@endsection