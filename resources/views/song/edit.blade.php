@extends('layouts.head')

@section('title', 'Admin')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <h3>Add song</h3>
        </div>
        <form action="{{ route('song.update', $song->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="firstname" class="control-label">Name:</label>
                        <input type="text" name="name" value="{{ $song->name }}" class="form-control" id="firstname" placeholder="Name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Artist:</label>
                        <select class="form-control" name="artist" id="exampleFormControlSelect1">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->username }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Album:</label>
                        <select class="form-control" name="album" id="exampleFormControlSelect1">
                            <option value="0">None</option>
                            @foreach($albums as $album)
                                <option value="{{$album->id}}" selected>{{$album->name}} - {{ $users->find($album->user_id)->username }}</option>
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