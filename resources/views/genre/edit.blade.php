@extends('layouts.head')

@section('title', 'Admin')

@section('content')

    <div class="container">
        <div class="row mt-4">
            <h3>Edit album</h3>
        </div>
        <form action="{{ route('genre.update', $genre->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="firstname" class="control-label">Name:</label>
                        <input type="text" value="{{$genre->name}}" name="name" class="form-control" id="firstname" placeholder="Name">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-xs-3">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
            <br>
        </form>
    </div>
    </div>

@endsection
