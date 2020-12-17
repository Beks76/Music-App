@extends('layouts.head')

@section('title', 'Profile')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <h3>Edit profile</h3>
        </div>
        <form action="{{ route('profile.update', $user->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="firstname" class="control-label">username:</label>
                        <input type="text" value="{{$user->username}}" name="username" class="form-control" id="firstname" placeholder="Name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="firstname" class="control-label">email:</label>
                        <input type="text" value="{{$user->email}}" name="email" class="form-control" id="firstname" placeholder="Email">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="firstname" class="control-label">first name:</label>
                        <input type="text" value="{{$user->first_name}}" name="first_name" class="form-control" id="firstname" placeholder="First Name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="firstname" class="control-label">last name:</label>
                        <input type="text" value="{{$user->last_name}}" name="last_name" class="form-control" id="firstname" placeholder="Last Name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="firstname" class="control-label">location</label>
                        <input type="text" value="{{$user->location}}" name="location" class="form-control" id="firstname" placeholder="Location">
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
@endsection
