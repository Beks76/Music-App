@extends('layouts.head')

@section('title', 'Home')

@section('content')

    <section id="sub_header" class="sub_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="offer">
                        <p class="offer__title">
                            Discover, search, and play any song featuring voice control.
                        </p>
                        <button class="btn">Try it free</button>
                        <ul class="icons d-flex align-items-center">
                            <li class="icons__item">
                                <a href="">
                                    <img src="/assets/img/appstore.png" alt="">
                                </a>
                            </li>
                            <li class="icons__item">
                                <a href="">
                                    <img src="/assets/img/googleplay.png" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="sponsors" class="sponsors">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="company d-flex">
                        <li class="company__item">
                            <a href="#">
                                <img src="/assets/img/playstation-wordmark.svg" alt="">
                            </a>
                        </li>
                        <li class="company__item">
                            <a href="#">
                                <img src="/assets/img/BlackBerry.svg" alt="">
                            </a>
                        </li>
                        <li class="company__item">
                            <a href="#">
                                <img src="/assets/img/redbull.svg" alt="">
                            </a>
                        </li>
                        <li class="company__item">
                            <a href="#">
                                <img src="/assets/img/tiktok-icon-white-1.svg" alt="">
                            </a>
                        </li>
                        <li class="company__item">
                            <a href="#">
                                <img src="/assets/img/SENNHEISER_Basic_logo.svg" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="recomend" class="recomend">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="album" >
                        <a href="#" class="album__poster" data-switch="0">
                            <img src="/assets/img/12545431_486880568181753_2073200248_n.svg" class="singer" alt="">    
                        </a>
                        <a href="#" class="album__poster" data-switch="1">
                            <img src="/assets/img/39e4598ce6d83898aa96468e9af8993e.svg" class="singer" alt="">
                        </a>
                        <a href="#" class="album__poster" data-switch="2">
                            <img src="/assets/img/3af0e55ea66ea69e35145fb108b4a636.svg" class="singer" alt="">
                        </a>
                        <a href="#" class="album__poster" data-switch="3">
                            <img src="/assets/img/8ddf985207de08d839f8d6e0afebd762.svg" class="singer" alt="">
                        </a>
                        <a href="#" class="album__poster" data-switch="4">
                            <img src="/assets/img/ffbee5009a7719cc608d1ba337388fdf.svg" class="singer" alt="">
                        </a>
                        <a href="#" class="album__poster" data-switch="5">
                            <img src="/assets/img/3f9b1ab0095226f5af5f5720e1a49acd.svg" class="singer" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 ml-auto">
                    <div class="offer">
                        <h2 class="offer__title">The music you love</h2>
                        <p class="offer__text">
                            With over 60 million tracks and tons of exclusive interviews and videos, TIDAL is here to bring you closer to the artists you listen to.
                        </p>
                        <a href="" class="offer__link"><i class="fa fa-angle-right"></i> More Featured Content</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pick" class="pick">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="offer">
                        <h2 class="offer__title">Hand-picked playlists</h2>
                        <p class="offer__text">
                            Stream guest playlists curated by the artists you love. Also, check out our original playlists hand-picked by our team of experts.
                        </p>
                        <a href="" class="offer__link"><i class="fa fa-angle-right"></i> Discover Radioheat</a>
                    </div>
                </div>
                <div class="col-lg-6 ml-auto">
                    <div class="block d-flex">
                        <img src="/assets/img/Artboard.png" alt="">
                        <img src="/assets/img/Artboard2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="why" class="why">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="offer">
                        <h2 class="offer__title">Why radiohead?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="feature d-flex">
                        <div class="feature__block">
                            <h3 class="feature__title">
                                A world of music in your pocket.
                            </h3>
                            <p class="feature__text">
                                Find new loves and old favourites from over 56 million tracks.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="feature d-flex">
                        <div class="feature__block">
                            <h3 class="feature__title">
                                Craft your collection.
                            </h3>
                            <p class="feature__text">
                                Create playlists from millions of tracks and take them with you wherever you go.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="feature d-flex">
                        <div class="feature__block">
                            <h3 class="feature__title">
                                No WiFi? No problem.
                            </h3>
                            <p class="feature__text">
                                With Issabekradio Premium, you don't need to be connected to enjoy your favourite tracks.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="feature d-flex">
                        <div class="feature__block">
                            <h3 class="feature__title">
                                Made for you.
                            </h3>
                            <p class="feature__text">
                                Flow gets to know what you like and what you don't. Discover your personal soundtrack.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <div class="fixed-bottom">
        <div class="player d-flex">
            <div id="aplayer">
                <h1>Where is text</h1>
            </div>
            <div class="close">
                x
            </div>
        </div>
    </div> --}}

@endsection
