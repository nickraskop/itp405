@extends("layouts.main")

@section("title")
@endsection

@section("content")
    
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if ($val)
        <h1>Maintenance Mode is ON</h1>
    @else
        <h1>Maintenance Mode is OFF</h1>
    @endif
    <h4>Check box for maintenance mode. Uncheck box to to turn off.</h4>
    <form action="{{ route('maintenance.update') }}" method="POST">
        @csrf
        <label for="value" class="form-label">Maintenance Mode</label>
        <input type="checkbox" name="value" id="value">
        <button type="submit" class="btn btn-primary">
            Save
        </button>
    </form>
@endsection