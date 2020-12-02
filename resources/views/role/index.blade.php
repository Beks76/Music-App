@extends('layouts.head')

@section('title', 'Admin')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-10 mt-4 ml-auto mr-auto">
                <h3>Roles</h3>
                <div class="col-md-6 offset-5 mt-5">
                    <a class="btn btn-info btn-just-icon btn-sm" href="{{ route('role.create') }}">Add role</a>
                </div>
                <div class="table-responsive mt-5">
                    <table style="color: white" class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $r)
                            <tr>
                                <td class="text-center">{{ $r->id }}</td>
                                <td>{{ $r->name }}</td>
                                <td class="d-sm-flex justify-content-right">
                                    <a href="{{route('role.show', $r->id)}}" rel="tooltip" class="btn btn-info btn-just-icon btn-sm" data-original-title="" title="">
                                        <i class="material-icons">role</i>
                                    </a>

                                    <a href="{{route('role.edit', $r->id)}}" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <form action="{{route('role.destroy', $r->id)}}" method="POST">
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
