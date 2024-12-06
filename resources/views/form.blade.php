@extends('layout')
@section('content')
    <div class="col-4">
        <h2>{{ $action }}</h2>
        <form method="POST" action="{{ $actionUrl }}" class="form">
            @csrf
            <div class="form-group">
                <label for="name">User Name</label>
                <br>
                <input type="text" name="name" id="name" value="{{ $user->name }}"
                    class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="age">User Age</label>
                <br>
                <input type="text" name="age" id="age" value="{{ old('age') ?? $user->age }}"
                    class="form-control @error('name')
                    is-invalid
                @enderror">
                @error('age')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
