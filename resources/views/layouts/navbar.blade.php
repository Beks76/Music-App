<header id="header" class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <a href="{{ route('home.index') }}" class="logo">{{ config('app.name') }}</a>
            </div>
            <div class="col-lg-3">
                <form action="" class="navbar-form">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="search" name="search" id="" placeholder="Search Anything Here..." class="form-control">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                        </div>
                    </div>
                </form>
            </div>
            @if (Auth::check())
                <div class="col-lg-5 ml-auto">
                    <nav class="nav">
                        <ul class="menu d-flex">
                            <li class="menu__item">
                                <a href="chart.html">Chart</a>
                            </li>
                            <li class="menu__item">
                                <a href="devices.html">Artists</a>
                            </li>
                            <li class="menu__item">
                                <a href="{{ route('profile.index', Auth::id()) }}">{{ Auth::user()->getNameOrUsername() }}</a>
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
                                <a href="{{ route('auth.signin') }}" class="btn">Sign in</a>
                            </li>
                            <li class="menu__item">
                                <a href="{{ route('auth.signup') }}" class="btn">Sign up</a>
                            </li>          
                        </ul>
                    </nav>
                </div>
            @endif
        </div>
    </div>
</header>