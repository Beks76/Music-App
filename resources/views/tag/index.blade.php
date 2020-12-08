@extends('layouts.head')

@section('title', 'Admin')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-10 mt-4 ml-auto mr-auto">
                <h3>Tags</h3>
                <div class="col-md-6 offset-5 mt-5">
                    <a class="btn btn-info btn-just-icon btn-sm" href="{{ route('tag.create') }}">Add tags</a>
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
                        @foreach($tags as $t)
                            <tr>
                                <td class="text-center">{{ $t->id }}</td>
                                <td>{{ $t->name }}</td>
                                <td class="d-sm-flex justify-content-right">
                                   
                                    <a href="{{route('tag.edit', $t->id)}}" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <form action="{{route('tag.destroy', $t->id)}}" method="POST">
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
