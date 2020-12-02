@extends('layouts.head')

@section('title', 'Admin')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Admin panel</h3>
            </div>

            <div class="col-lg-4">
                <div class="d-flex flex-column">
                    <a class="btn btn-info btn-just-icon btn-sm mt-4" href="{{ route('album.index') }}">Albums</a>
                    <a class="btn btn-info btn-just-icon btn-sm mt-4" href="{{ route('genre.index') }}">Genres</a>
                    <a class="btn btn-info btn-just-icon btn-sm mt-4" href="{{ route('tag.index') }}">Tags</a>
                    <a class="btn btn-info btn-just-icon btn-sm mt-4 mb-4" href="{{ route('role.index') }}">Roles</a>
                </div>
            </div>
        </div>
    </div>

@endsection
