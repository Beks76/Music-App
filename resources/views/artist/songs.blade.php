@extends('layouts.head')

@section('title', 'Songs')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-10 mt-4 ml-auto mr-auto">
                <h3>Songs</h3>
                <div class="table-responsive mt-5">
                    <table style="color: white" class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($songs as $song)
                                @if ($album_id->contains($song->id))
                                    <tr>
                                        <td class="text-center">{{ $song->id }}</td>
                                        <td>{{ $song->name }}</td>
                                        <td class="d-sm-flex justify-content-right">

                                            <a href="{{route('song.edit', $song->id)}}" rel="tooltip" class="btn btn-success btn-just-icon btn-sm mr-4" data-original-title="" title="">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <form action="{{route('song.destroy', $song->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <button rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
