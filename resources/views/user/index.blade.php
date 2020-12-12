@extends('layouts.head')

@section('title', 'Admin')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-10 mt-4 ml-auto mr-auto">
                <h3>Users</h3>
                <div class="col-md-6 offset-5 mt-5">
                    <a class="btn btn-info btn-just-icon btn-sm" href="{{ route('user.create') }}">Add user</a>
                </div>
                <div class="table-responsive mt-5">
                    <table style="color: white" class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>email</th>
                                <th>username</th>
                                <th>first name</th>
                                <th>last name</th>
                                <th>action</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $u)
                            <tr>
                                <td class="text-center">{{ $u->id }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->username }}</td>
                                <td>{{ $u->first_name }}</td>
                                <td>{{ $u->last_name }}</td>

                                <td class="d-sm-flex justify-content-right">
                                    <a href="{{route('user.show', $u->id)}}" rel="tooltip" class="btn btn-info btn-just-icon btn-sm" data-original-title="" title="">
                                        <i class="material-icons">user</i>
                                    </a>
                                    <a href="{{route('user.edit', $u->id)}}" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <form action="{{route('user.destroy', $u->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf

                                        <button rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
