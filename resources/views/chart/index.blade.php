@extends('layouts.head')

@section('title', 'Home')

@section('content')

<section id="chart" class="chart">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <p class="chart__title">Charts</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p class="chart__subtitle">Today's top tracks</p>
                <p class="chart__gray">Fresh every day</p>
                <div class="charts d-flex">
                    <img src="/assets/img/TOPUSA.png" alt="">
                    <div class="chart__block">
                        <p class="chart__title">Top Usa</p>
                        <p class="chart__gray">100 tracks - 507 291 fans</p>
                    </div>
                    <div class="chart__tracks">
                        <p class="chart__gray">Tracks</p>
                        <nav>
                            <li>
                                <p><span class="chart__gray">01</span> WAP (feat. Megan Thee Stallion) <span class="chart__gray"> by Cardi B</span></p>
                            </li>
                            <li>
                                <p><span class="chart__gray">02</span> Blinding Lights <span class="chart__gray"> by The Weeknd</span></p>
                            </li>
                            <li>
                                <p><span class="chart__gray">03</span> ROCKSTAR <span class="chart__gray"> by DaBaby</span></p>
                            </li>
                            <li>
                                <p><span class="chart__gray">04</span> Laugh Now Cry Later <span class="chart__gray"> by Drake</span></p>
                            </li>
                            <li>
                                <p><span class="chart__gray">05</span> Dance Monkey <span class="chart__gray"> by Tones and I</span></p>
                            </li>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="track" class="track">
    <div class="container">
        @foreach($genres as $genre)
            <div class="track__block">
                <div class="row">
                    <div class="col-lg-2">
                        <p class="chart__title">{{ $genre->name }}</p>
                    </div>
                </div>
                <div class="row">
                    @foreach($albums as $album)
                        @if ($genre->id == $album->genre->id)
                            <div class="col-lg-3">
                                <div class="tracks">
                                    <div class="tracks__item">
                                        <img src="{{ $album->cover }}" alt="">
                                        <p class="track__text">
                                            @foreach ($album->tags()->get() as $tag)
                                               <a href=""> #{{$tag->name}}</a>
                                            @endforeach
                                        </p>
                                        <p>{{ $album->name }} - {{ $album->artist }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach

        {{-- <div class="track__block">
            <div class="row">
                <div class="col-lg-4">
                    <p class="chart__title">Series soundtracks</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="tracks">
                        <div class="tracks__item">
                            <img src="/assets/img/s.png" alt="">
                            <p>Top worldwide</p>
                            <p class="track__text">100 tracks - 600,669 fans</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="tracks">
                        <div class="tracks__item">
                            <img src="/assets/img/s2.png" alt="">
                            <p>Top worldwide</p>
                            <p class="track__text">100 tracks - 600,669 fans</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="tracks">
                        <div class="tracks__item">
                            <img src="/assets/img/s3.png" alt="">
                            <p>Top worldwide</p>
                            <p class="track__text">100 tracks - 600,669 fans</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="tracks">
                        <div class="tracks__item">
                            <img src="/assets/img/s4.png" alt="">
                            <p>Top worldwide</p>
                            <p class="track__text">100 tracks - 600,669 fans</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="track__block">
            <div class="row">
                <div class="col-lg-4">
                    <p class="chart__title">Your music therapy</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="tracks">
                        <div class="tracks__item">
                            <img src="/assets/img/tr.png" alt="">
                            <p>Top worldwide</p>
                            <p class="track__text">100 tracks - 600,669 fans</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="tracks">
                        <div class="tracks__item">
                            <img src="/assets/img/tr2.png" alt="">
                            <p>Top worldwide</p>
                            <p class="track__text">100 tracks - 600,669 fans</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="tracks">
                        <div class="tracks__item">
                            <img src="/assets/img/tr3.png" alt="">
                            <p>Top worldwide</p>
                            <p class="track__text">100 tracks - 600,669 fans</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="tracks">
                        <div class="tracks__item">
                            <img src="/assets/img/tr4.png" alt="">
                            <p>Top worldwide</p>
                            <p class="track__text">100 tracks - 600,669 fans</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>


@endsection
