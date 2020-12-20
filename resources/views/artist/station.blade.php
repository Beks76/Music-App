@extends('layouts.head')

@section('title', 'Music station')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-4">
                <h3>Music station</h3>
            </div>

            <div class="col-lg-4">
                <div class="d-flex flex-column mb-4">
                    <a class="btn btn-info btn-just-icon btn-sm mt-4" href="{{ route('profile.album_create', Auth::user()->username) }}">Create album</a>
                    {{-- <a class="btn btn-info btn-just-icon btn-sm mt-4" href="{{ route('profile.song_create', Auth::user()->username) }}">Upload song</a> --}}
                    <a class="btn btn-info btn-just-icon btn-sm mt-4" href="{{ route('profile.album_create', Auth::user()->username) }}">My songs</a>
                </div>
            </div>
        </div>
    </div>

@endsection
