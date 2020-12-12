@extends('layouts.head')

@section('title', 'Admin')

@section('content')

    <div class="container">
        <div class="row mt-4">
            <h3>Edit album</h3>
        </div>
        <form action="{{ route('user.update', $users->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="firstname" class="control-label">First_Name:</label>
                        <input type="text" value="{{$users->first_name}}" name="fname" class="form-control" id="firstname" placeholder="Name">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="lastname" class="control-label">Last_Name:</label>
                        <input type="text" value="{{$users->last_name}}" name="lname" class="form-control" id="lastname" placeholder="Name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <input type="text" value="{{$users->email}}" name="email" class="form-control" id="email" placeholder="Artist">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Role:</label>
                        <select class="form-control" name="role" id="exampleFormControlSelect1">
                            @foreach($role as $r)
                                @if ($r->id == ($users->role->id ?? null))
                                    <option value="{{$r->id}}" selected>{{$r->name}}</option>
                                @else
                                    <option value="{{$r->id}}">{{$r->name}}</option>
                                @endif
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
