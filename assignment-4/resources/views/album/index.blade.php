@extends("layouts.main")

@section("title", "Albums")

@section("content")
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3 text-end">
        <a href="{{ route('album.create') }}">New Album</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Album</th>
                <th colspan="2">Artist</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
                <tr>
                    <td>
                        {{$album->title}}
                    </td>
                    <td>
                        {{$album->artist->name}}
                    </td>
                    <td>
                        <a href="{{ route('album.edit', [ 'id' => $album->id ]) }}">
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection