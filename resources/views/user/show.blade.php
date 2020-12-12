@extends('layouts.head')

@section('title', 'Admin')

@section('content')

    <div class="container">
        <div class="album-section mt-4 mb-4" id="album-section">
            <div class="album-info">
                <div class="row">

                    <div class="col-lg-9">
                        <div class="album-details">
                            <h2>Username: {{$users->username}}</h2>
                            <p>EMail: {{$users->email}}</p>
                            <p>Name: {{$users->first_name}} {{$users->last_name}}</p>
                            @if (isset($users->stripe_id))
                                <p>Subscription: Yes</p>
                            @else
                                <p>Subscription: No</p>
                            @endif
                            <div class="mt-4">
                                <p>Role: </p>
                                @foreach ($users->roles()->get() as $role)
                                    <p>-{{$role->name ?? 'Null'}}</p>
                                    <form action="{{route('user.destroyrole', $role->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="userid" id="userid" value="{{ $users->id }}">

                                        <button rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

@endsection
