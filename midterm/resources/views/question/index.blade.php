@extends("layouts.main")

@section("title", "Home - Q/A")

@section("content")
    <form action="{{ route('question.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="body" class="form-label"></label>
            <input type="text" name="body" id="body" class="form-control" value="{{ old('body') }}" placeholder="What is your favorite movie?">
            @error("body")
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            Ask away
        </button>
    </form>

    <h1>Questions</h1>
    @foreach($questions as $question)
      <!-- <h2>{{$question->body}}</h2> -->
      <h1><a href="{{ route('question.show', ['id' => $question->id]) }}">{{$question->body}}</a></h1>
      <h6>Posted on {{date_format($question->created_at, 'n/j/Y')}} at {{date_format($question->created_at, 'g:i A')}}</h6>
      <h5>{{count($question->answers)}} answers</h5>
    @endforeach
@endsection