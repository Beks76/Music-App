@extends('layouts.head')

@section('title', 'Admin')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <h3>Add song</h3>
        </div>
        <form action="{{ route('song.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="firstname" class="control-label">Name:</label>
                        <input type="text" name="name" class="form-control" id="firstname" placeholder="Name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Artist:</label>
                        <input type="text" name="artist" class="form-control" id="lastname" placeholder="Artist">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Album:</label>
                        <select class="form-control" name="album" id="exampleFormControlSelect1">
                            <option value="0">None</option>
                            @foreach($albums as $album)
                                <option value="{{$album->id}}">{{$album->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="path">Upload</label>
                        <input type="file" id="path" accept="audio/mpeg" name="song">
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