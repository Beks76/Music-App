@extends('layouts.head')

@section('title', 'Admin')

@section('content')

    <div class="container">
        <div class="row">
            <h3>Add album</h3>
        </div>
        <form action="{{ route('backend.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="firstname" class="control-label">Name:</label>
                        <input type="text" name="name" class="form-control" id="firstname" placeholder="Name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Artist:</label>
                        <input type="text" name="position" class="form-control" id="lastname" placeholder="Artist">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Genre:</label>
                        <select class="form-control" name="genre" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Tag:</label>
                        <select class="form-control" name="genre" id="exampleFormControlSelect1">
                            <option>New release</option>
                            <option>Soundtracks</option>
                            <option>Dance feel</option>
                            <option>Podcasts</option>
                            <option>Sport</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Year</label>
                        <input type="text" name="salary" class="form-control" id="lastname" placeholder="Year">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Album cover</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xs-3">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </form>
        </div>
    </div>

@endsection