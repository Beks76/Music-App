<header id="header" class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar">
                    <div class="col-lg-2">
                        <a href="{{ route('home.index') }}" class="logo">{{ config('app.name') }}</a>
                    </div>
                    @if (Auth::check())
                        <div class="col-lg-4">
                            <form method="GET" action="{{ route('search.index') }}" class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="query">
                                    <div class="input-group-btn">
                                        <button class="btn-default" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-5 ml-auto">
                            <nav class="nav">
                                <ul class="menu d-flex">
                                    <li class="menu__item">
                                        <a href="{{route('chart.index')}}">Home</a>
                                    </li>
                                    <li class="menu__item">
                                        <a href="devices.html">Artists</a>
                                    </li>
                                    <li class="menu__item">
                                        <a href="{{ route('profile.index', Auth::user()->username) }}">{{ Auth::user()->getNameOrUsername() }}</a>
                                    </li>
                                    <li class="menu__item">
                                        <a href="{{ route('auth.logout') }}">Log out</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    @else
                        <div class="col-lg-4 ml-auto">
                            <nav class="nav">
                                <ul class="menu d-flex">
                                    <li class="menu__item">
                                        <a href="{{ route('auth.signin') }}" class="btn">Login</a>
                                    </li>
                                    <li class="menu__item">
                                        <a href="{{ route('auth.signup') }}" class="btn">Register</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>  
</header>
