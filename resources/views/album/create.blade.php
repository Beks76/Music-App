@extends('layouts.head')

@section('title', 'Admin')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <h3>Add album</h3>
        </div>
        <form action="{{ route('album.store')}}" method="POST" enctype="multipart/form-data">
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
                        <select class="form-control" name="artist" id="exampleFormControlSelect1">
                            @foreach($users as $user)
                                @if ($user->hasAnyRole('artist'))
                                    <option value="{{$user->id}}">{{$user->username}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Genre:</label>
                        <select class="form-control" name="genre" id="exampleFormControlSelect1">
                            @foreach($genres as $gen)
                                <option value="{{$gen->id}}">{{$gen->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Tag:</label>
                        <select class="form-control" name="tag" id="exampleFormControlSelect1">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">#{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Year</label>
                        <input type="text" name="year" class="form-control" id="lastname" placeholder="Year">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Album cover</label>
                        <input type="file" class="form-control-file" id="image" name="cover">
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