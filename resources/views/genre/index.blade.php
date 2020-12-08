@extends('layouts.head')

@section('title', 'Admin')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-10 mt-4 ml-auto mr-auto">
                <h3>Genres</h3>
                <div class="col-md-6 offset-5 mt-5">
                    <a class="btn btn-info btn-just-icon btn-sm" href="{{ route('genre.create') }}">Add genres</a>
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
                        @foreach($genres as $g)
                            <tr>
                                <td class="text-center">{{ $g->id }}</td>
                                <td>{{ $g->name }}</td>
                                <td class="d-sm-flex justify-content-right">
                                    
                                    <a href="{{route('genre.edit', $g->id)}}" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <form action="{{route('genre.destroy', $g->id)}}" method="POST">
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
