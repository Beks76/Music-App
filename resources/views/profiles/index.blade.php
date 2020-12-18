@extends('layouts.head')

@section('title', 'Profile')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="profile align-items-center d-flex mt-4 mb-4">
                    <div class="profile__img">
                        <img src="https://image.flaticon.com/icons/png/128/3011/3011270.png" alt="">
                    </div>
                    <div class="profile__info ml-4">
                        @if (Auth::user()->id != $user->id)
                            <p>Collection</p>
                        @else
                            <p>My collection</p>
                        @endif

                        @if ($user->hasAnyRole('artist'))
                            <div class="d-flex ">
                                <h2>{{$user->getNameOrUsername() }}</h2>
                                <a href="#" class="mt-2 ml-2">🎤</a>
                            </div>
                            <p>followers: {{ $followersCount }}</p>
                        @else
                            <h2>{{$user->getNameOrUsername() }}</h2>
                        @endif
                        <div class="profile__action d-flex mt-4">
                            @if (Auth::user()->id != $user->id && $user->hasAnyRole('artist'))
                                @if (Auth::user()->following()->pluck('artist_id')->contains($user->artist()->get()->pluck('id')->first()))
                                    <a href="{{ route('profile.follow', $user->id) }}" class="btn mr-4">Unfollow</a>
                                @else
                                    <a href="{{ route('profile.follow', $user->id) }}" class="btn mr-4">Follow</a>
                                @endif

                            @endif

                            @if (Auth::user()->id == $user->id)
                                <a href="{{ route('profile.edit', Auth::user()->id) }}" class="btn">Edit</a>
                                @if(isset($sub))
                                    <a id="subs" class="btn btn-default" data-toggle="modal" data-target="#cancel">Cancel Subscription</a>
                                @else
                                    <a id="subs" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">Get Subscription</a>
                                @endif
                            @endif
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
    @if (Auth::user()->id == $user->id)
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
        <div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">Submition</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body "><p class="text-danger">Are you sure?</p></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <br>
                        <form id="payment-form" action="{{ route('payments.cancel') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

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
