<header id="header" class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <a href="{{ route('home.index') }}" class="logo">{{ config('app.name') }}</a>
            </div>
            @if (Auth::check())
                <div class="col-lg-5 ml-auto">
                    <nav class="nav">
                        <ul class="menu d-flex">
                            <li class="menu__item">
                                <a href="chart.html">Chart</a>
                            </li>
                            <li class="menu__item">
                                <a href="devices.html">Devices</a>
                            </li>
                            <li class="menu__item">
                                <a href="devices.html">{{ Auth::user()->getNameOrUsername() }}</a>
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