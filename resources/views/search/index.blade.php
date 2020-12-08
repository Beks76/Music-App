@extends('layouts.head')

@section('title', 'Search')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Results:</h2>

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

@endsection
