@extends("layouts.main")

@section("title", $question->body)

@section("content")
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <h1>{{$question->body}}</h1>

    @if (count($question->answers) == 0)
            <p>No answers yet! Be the first to answer by using the form below.</p>
    @endif

    <form action="{{ route('answer.store', [ 'id' => $question->id ]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="body" class="form-label"></label>
            <input type="text" name="body" id="body" class="form-control" value="{{ old('body') }}">
            @error("body")
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        @foreach($question->answers as $answer)
            <h4>{{$answer->body}}</h4>
            <h6>Posted on {{date_format($question->created_at, 'n/j/Y')}} at {{date_format($question->created_at, 'g:i A')}}</h6>
        @endforeach

        <button type="submit" class="btn btn-primary">
            Answer Question
        </button>
    </form>
@endsection