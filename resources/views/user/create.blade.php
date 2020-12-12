@extends('layouts.head')

@section('title', 'Admin')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <h3>Add album</h3>
        </div>
        <form action="{{ route('user.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="firstname" class="control-label">First name:</label>
                        <input type="text" name="fname" class="form-control" id="firstname" placeholder="First Name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="lastname" class="control-label">Last name:</label>
                        <input type="text" name="lname" class="form-control" id="lastname" placeholder="Last Name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="email" class="control-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="username" class="control-label">Username:</label>
                        <input type="username" name="username" class="form-control" id="username" placeholder="Username">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="password" class="control-label">Password:</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="role" class="control-label">Role:</label>
                        <select class="form-control" name="role" id="role">
                            @foreach($role as $r)
                                <option value="{{$r->id}}">{{$r->name}}</option>
                            @endforeach
                        </select>
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
