@extends('layouts.head')

@section('title', 'Admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-10 mt-4 ml-auto mr-auto">
                <h3>Albums</h3>
                <div>
                    <a href="{{ route('backend.create') }}">Add album</a>
                </div>
                <div class="table-responsive">
                    <table style="color: white" class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Artist</th>
                                <th>Genre</th>
                                <th class="text-right">Year</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">a</td>
                                <td>s</td>
                                <td>assdad</td>
                                <td>asd</td>
                                <td class="text-right">asd</td>
                                <td class="td-actions text-right">
                                    <a href="" rel="tooltip" class="btn btn-info btn-just-icon btn-sm" data-original-title="" title="">
                                        <i class="material-icons">person</i>
                                    </a>
                                    <a href="" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <form action="" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button rel="tooltip" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection