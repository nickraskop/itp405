@extends("layouts.main")

@section("title", "Albums")

@section("content")
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (Auth::check())
        <div class="mb-3 text-end">
            <a href="{{ route('album.create') }}">New Album</a>
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Album</th>
                <th>Artist</th>
                <th colspan="2">Creator</th>
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
                        {{ $album->user->name }}
                    </td>
                    @if (!Gate::denies('edit-album', $album))
                    <td>
                        <a href="{{ route('album.edit', [ 'id' => $album->id ]) }}">
                            Edit
                        </a>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection