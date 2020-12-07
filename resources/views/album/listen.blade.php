@extends('layouts.head')

@section('title', 'Admin')

@section('content')
    {{-- <link rel="stylesheet" href="/assets/css/mp3Player.css" type="text/css"> --}}
    <section class="fullwidth-block inner-content">
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
                                <p>Genre: {{$album->genre->name}}</p>
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
            </div>



            <div>
                <div class="column add-bottom">
                    <div id="mainwrap">
                        <div id="nowPlay">
                            <span class="left" id="npAction">Paused...</span>
                            <span class="right" id="npTitle"></span>
                        </div>
                        <div id="audiowrap" style="">
                            <div id="audio0">
                                <audio preload id="audio1" controls="controls">Your browser does not support HTML5 Audio!</audio>
                            </div>
                            <div id="tracks">
                                <a id="btnPrev">&larr;</a>
                                <a id="btnNext">&rarr;</a>
                            </div>
                        </div>
                        <hr>
                        <div id="plwrap">
                            <ul id="plList" style=""></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="/assets/bootstrap4/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/html5media.min.js"></script>
    <script src="/asset/js/plyr.js}}"></script>
    <script src="/assets/js/prefixfree.min.js"></script>

    @include('album.player')
@endsection
