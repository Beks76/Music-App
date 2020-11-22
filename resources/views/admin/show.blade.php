@extends('layouts.head')

@section('title', 'Admin')

@section('content')

    <div class="container">
        <div class="row mt-3">
            <h3>Info album</h3>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="col-md-12 text-center">
                        <h5>Info Album ID: {{$album->id}} </h5>
                    </div>

                    <div class="col-md-6 offset-3 mt-5">
                        <b>Album:</b>
                        <p class="lead">{{$album->name}} - {{$album->artist}} </p>
                    </div>
                    <div class="col-md-6 offset-3 mt-5">
                        <b>Genre: </b>
                        <p class="lead">{{$album->genre->name}} </p>
                    </div>
                    <div class="col-md-6 offset-3 mt-5">
                        <b>Year: </b>
                        <p class="lead">{{$album->year}} </p>
                    </div>
                    <div class="col-md-6 offset-3 mt-5">
                        <b>Tags:</b>
                        <ul>
                            @foreach($album->tags as $tag)
                                <li>#{{$tag->name}}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-md-6 offset-3 mt-5">

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
