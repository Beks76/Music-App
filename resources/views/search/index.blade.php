@extends('layouts.head')

@section('title', 'Search')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="search mt-4 mb-4">
                    <h2>Results: <div class="btn-group dropright">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Order by
                            </button>
                            <div class="dropdown-menu">
                                <a href="/search/{{isset($sort) ? $sort : 'asc'}}" class="dropdown-item">name</a>
                                <a href="/searchyear/{{isset($sort) ? $sort : 'asc'}}" class="dropdown-item">year</a>
                            </div>
                        </div></h2>



                    @forelse($result as $album)
                            <div class="tracks mt-4 mb-4">
                                <div class="tracks__item d-flex">
                                    <a href="{{ route('album.show', $album->id) }}">
                                        @if (Str::startsWith($album->cover, 'http'))
                                            <img class="mr-4" src="{{ $album->cover }}" alt="">
                                        @else
                                            <img class="mr-4" src="/storage/{{$album->cover }}" alt="">
                                        @endif
                                    </a>
                                    <div class="track__text">
                                        <p>{{ $album->name }} - {{ $album->artist }}</p>
                                        <p>
                                            @foreach ($album->tags()->get() as $tag)
                                                <a href=""> #{{$tag->name}}</a>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                    @empty
                        <p>No results</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
