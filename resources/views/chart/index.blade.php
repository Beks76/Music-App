@extends('layouts.head')

@section('title', 'Home')

@section('content')

<section id="chart" class="chart">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <p class="chart__title">Chart</p>
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
        @forelse($genres as $genre)
            <div class="track__block">
                <div class="row">
                    <div class="col-lg-2">
                        <p class="chart__title">{{ $genre->name }}</p>
                    </div>
                </div>
                <div class="row">
                    @foreach($albums as $album)
                        @if ($genre->id == $album['genre_id'])
                            <div class="col-lg-3">
                                <div class="tracks">
                                    <div class="tracks__item">
                                        @if (isset($sub))
                                            <a href="{{ route('album.show', $album->id) }}">
                                                @if (Str::startsWith($album->cover, 'http'))
                                                    <img src="{{ $album->cover }}" alt="">
                                                @else
                                                    <img src="/storage/{{$album->cover }}" alt="">
                                                @endif
                                            </a>

                                        @elseif($role->name=='admin')
                                            <a href="{{ route('album.show', $album->id) }}">
                                                @if (Str::startsWith($album->cover, 'http'))
                                                    <img src="{{ $album->cover }}" alt="">
                                                @else
                                                    <img src="/storage/{{$album->cover }}" alt="">
                                                @endif
                                            </a>
                                        @else

                                            <a href="{{ route('album.show', $album->id) }}" data-toggle="modal" data-target="#exampleModal">
                                                @if (Str::startsWith($album->cover, 'http'))
                                                    <img src="{{ $album->cover }}" alt="">
                                                @else
                                                    <img src="/storage/{{$album->cover }}" alt="">
                                                @endif
                                            </a>

                                        @endif

                                        <p class="track__text">
                                            @foreach ($album->tags()->get() as $tag)
                                               <a href=""> #{{$tag->name}}</a>
                                            @endforeach
                                        </p>
                                        <p>
                                            {{ $album->name }} - 
                                            @foreach ($users as $user)
                                                @if ($user->id == $album->user_id)
                                                    <a href="{{ route('profile.index', $user->username) }}">{{ $user->getNameOrUsername() }}</a>
                                                @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        @empty
            <p>None</p>
        @endforelse

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document" >
                        <div class="modal-content">
                            <div class="modal-header border-none"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>
                            <div class="modal-body">


                            <div class="row md-6">
                                @foreach($plans as $plan)

                                            <div class="col-lg">
                                                <label for="plan-silver">
                                                    <div class="col"> <img src="https://placeimg.com/150/265/any?" width="100%"> </div>
                                                </label><br>
                                            <label for="plan-silver">
                                                <span class="plan-name"><p class="text-secondary">{{$plan->title}}</p></span>
                                            </label><br>
                                            <label for="plan-silver">
                                                <span class="plan-price"><p class="text-secondary"><small>{{$plan->price}}</small></p></span>
                                            </label>
                                                <br>
                                                <a href="{{ route('payments', ['plan' => $plan->id]) }}" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                                    <i class="material-icons">SEE MORE</i>
                                                </a>
                                            </div>

                                @endforeach
                            </div>
                        </div>

                        <div class="modal-footer">
                            <h2>Woohoo</h2>
                            <p class="text-center"><small class="text-muted">Thank you for your subscription. You'll be sent the next issue of our newspaper shortly </small></p>
                            <div class="d-flex justify-content-center"> <button type="button" class="btn btn-success btn-just-icon">ok</button>
                                <p><strong></strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
@push('script')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <style>



        .container-lg{
            display: flex;
            justify-content: center;
            margin-top: 200px;
            background: transparent
        }

        .trigger {
            background-color: black;
            color: red
        }



        .modal-content {

            background: transparent;
            border: none;
            padding: 0 19px
        }

        .modal-header {
            border: none
        }

        .close {
            position: absolute !important;
            right: 0;
            z-index: 1;
            border: 7px solid lightgray !important;
            width: 5px;
            height: 5px;
            border-radius: 10rem;
            background-color: #ECEFF1 !important;
            opacity: 1;
            top: 35px;
            right: 25px
        }

        .close>span {
            position: relative;
            bottom: 16px;
            right: 9px;
            font-size: 28px;
            background-color: transparent
        }

        .modal-body {
            border: none;
            background-color: #ECEFF1;
            border-radius: 8px;
            padding-bottom: 50px
        }

        .modal-footer {

            flex-direction: column;
            background-color: #ECEFF1;


        }

        .btn.focus,
        .btn:focus {
            outline: 0;
            box-shadow: none !important
        }

        .close.focus,
        .close:focus {
            outline: 0;
            box-shadow: none !important
        }


        .setting {
            margin-left: 10px;
            padding-top: 5px
        }

        @media(max-width:600px) {
            .modal-footer {
                bottom: 100px
            }
        }

        @media (max-width:320px) {
            .modal-footer {
                bottom: 90px
            }

            .setting {
                margin-left: 6px;
                padding-top: 5px;
                font-size: 14px
            }
        }
    </style>
