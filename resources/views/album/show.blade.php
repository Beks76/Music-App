@extends('layouts.head')

@section('title', 'Admin')

@section('content')

    <div class="container">
        <div class="album-section mt-4 mb-4" id="album-section">
            <div class="album-info">
                <div class="row">
                    <div class="col-md-3">
                        <div class="album-art">
                            @if (Str::startsWith($album->cover, 'http'))
                                <img src="{{ $album->cover }}" alt="">
                            @else
                                <img src="/storage/{{$album->cover }}" alt="">
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="album-details">
                            <h2>{{$album->name}}</h2>
                            <p>Released: {{$album->year}}</p>
                            <p>Genre: {{$album->genre->name ?? 'None'}}</p>
                            <p>Artist: <a href="{{ route('profile.index', $user->username) }}"> {{$user->username ?? 'None'}} </a></p>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, deserunt autem nesciunt vero rem obcaecati porro dolorem nostrum alias modi, quidem, unde quae quam soluta quibusdam ipsum perferendis qui molestiae.</p>

                            <div class="mt-4">
                                @foreach ($album->tags()->get() as $tag)
                                    <a href="#">#{{$tag->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="actions mt-4">
                <div style="width: 100%;">
                    <a href="{{ route('album.listen', $album->id) }}" class="btn mr-1">listen</a>
                    @if (auth()->user()->albums()->pluck('album_id')->contains($album->id))
                        <a href="{{ route('profile.album_delete', $album->id) }}" class="btn">delete</a>
                    @else
                        <a href="{{ route('profile.like', $album->id) }}" class="btn mr-1">like</a>
                    @endif
                    @if($album->user_id == auth()->user()->id)
                        <a href="{{ route('profile.album_edit', [auth()->user()->username, $album->id]) }}" class="btn">edit</a>

                        <div class="mt-4">
                            <form action="{{route('album.destroy', $album->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button rel="tooltip" class="btn" data-original-title="" title="">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
            <div class="album-tracks mt-4">
                <ol>  
                    @forelse($album->songs as $song)
                        <li>
                            <span class="album-track-name">
                                <span class="album-track-link">{{ $song->name }}</span>
                            </span>

                            <div class="d-flex mt-4">
                                <p class="album-track-length mr-4">{{ $song->length }}</p>
                                <a href="#" class="album-track-download mr-4"><span class="fa fa-download"></span></a>
                                <a href="#" class="album-track-download"><span class="fa fa-heart"></span></a>
                            </div>
                        </li>
                    @empty
                        <li>No music for now</li>
                    @endforelse
                </ol>
            </div>
           
        </div>
    </div>

@endsection
