@extends('layouts.head')

@section('title', 'Profile')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="profile d-flex mt-4 mb-4">
                    <div class="profile__img">
                        <img src="https://image.flaticon.com/icons/png/128/3011/3011270.png" alt="">
                    </div>
                    <div class="profile__info ml-4">
                        <p>My collection</p>
                        <h2>{{ Auth::user()->getNameOrUsername() }}</h2>
                        <div class="profile__action d-flex mt-4">
                            <a href="#" class="btn mr-4">Play</a>
                            <a href="#" class="btn">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="p_category d-flex justify-content-between mt-4 mb-4">                                
                    <a class="nav-item nav-link" href="#">Tracks</a>
                    <a class="nav-item nav-link" href="#">Albums</a>
                    <a class="nav-item nav-link" href="#">Artists</a>
                    <a class="nav-item nav-link" href="#">Podcasts</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="albums">
                    @foreach($albums as $album)
                        <div class="col-lg-3">
                            <div class="tracks mt-4 mb-4">
                                <div class="tracks__item">
                                    <a href="{{ route('album.show', $album->id) }}">
                                        @if (Str::startsWith($album->cover, 'http'))
                                            <img src="{{ $album->cover }}" alt="">
                                        @else
                                            <img src="/storage/{{$album->cover }}" alt="">
                                        @endif
                                    </a>
                                    <p class="track__text">
                                        <p>{{ $album->name }} - {{ $album->artist }}</p>
                                        @foreach ($album->tags()->get() as $tag)
                                            <a href=""> #{{$tag->name}}</a>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection