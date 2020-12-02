@extends('layouts.head')

@section('title', 'Admin')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-10 mt-4 ml-auto mr-auto">
                <h3>Albums</h3>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <a class="navbar-brand" href="{{route('album.index')}}">Genres:</a>
                        <div class="navbar-nav">
                            @foreach($genres as $gen)
                                <a class="nav-item nav-link" href="{{route('album.genre', $gen->id)}}">{{$gen->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </nav>
                <div class="col-md-6 offset-5 mt-5">
                    <a class="btn btn-info btn-just-icon btn-sm" href="{{ route('album.create') }}">Add album</a>
                </div>
                <div class="table-responsive mt-5">
                    <table style="color: white" class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Artist</th>
                                <th>Genre</th>
                                <th class="text-right">Year</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($albums as $a)
                            <tr>
                                <td class="text-center">{{ $a->id }}</td>
                                <td>{{ $a->name }}</td>
                                <td>{{ $a->artist }}</td>
                                <td>{{ $a->genre->name }}</td>
                                <td class="text-right">{{ $a->year }}</td>
                                <td class="d-sm-flex justify-content-right">
                                    <a href="{{route('album.show', $a->id)}}" rel="tooltip" class="btn btn-info btn-just-icon btn-sm" data-original-title="" title="">
                                        <i class="material-icons">album</i>
                                    </a>

                                    <a href="{{route('album.edit', $a->id)}}" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <form action="{{route('album.destroy', $a->id)}}" method="POST">
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
