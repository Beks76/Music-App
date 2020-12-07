@extends('layouts.head')

@section('title', 'Admin')

@section('content')

    <div class="container">
        <div class="row mt-4">
            <h3>Edit album</h3>
        </div>
        <form action="{{ route('album.update', $album->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="firstname" class="control-label">Name:</label>
                        <input type="text" value="{{$album->name}}" name="name" class="form-control" id="firstname" placeholder="Name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Artist:</label>
                        <input type="text" value="{{$album->artist}}" name="artist" class="form-control" id="lastname" placeholder="Artist">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Genre:</label>
                        <select class="form-control" name="genre_id" id="exampleFormControlSelect1">
                            @foreach($gen as $g)
                                @if ($g->id == ($album->genre->id ?? null))
                                    <option value="{{$g->id}}" selected>{{$g->name}}</option>
                                @else
                                    <option value="{{$g->id}}">{{$g->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Tag:</label>
                        <select class="form-control" name="tag" id="exampleFormControlSelect1">
                            @foreach($tags as $tag)
                                @if ($tag->id == ($album->tag->id ?? null))
                                    <option value="{{$tag->id}}" selected>{{$tag->name}}</option>
                                @else
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Year</label>
                        <input type="text" value="{{$album->year}}" name="year" class="form-control" id="lastname" placeholder="Year">
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
