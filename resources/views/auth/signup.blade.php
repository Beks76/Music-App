@extends('layouts.head')


@section('content')

<section id="signin" class="signin">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="formsign">
                    <p class="formsign__offer">
                        Sign up
                    </p>
                    <div class="btns d-flex justify-content-between">
                        <button class="formsign__btnb"> <i class="fa fa-apple"></i> Apple</button>
                        <button class="formsign__btnb"> <i class="fa fa-facebook"></i> Facebook</button>
                    </div>
                    
                    
                    <form action="{{ route('auth.store') }}" method="POST" novalidate>
                        @csrf
                        <input type="email" name=email class="formsign__input" value="{{ Request::old('email') }}" placeholder="Email address">
                        @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}  
                            </div>
                        @enderror
                        <input type="text" name=username class="formsign__input" value="{{ Request::old('login') }}" placeholder="Your login">
                        @error('username')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}  
                            </div>
                        @enderror
                        <input type="password" name=password class="formsign__input" placeholder="Password">
                        @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}  
                            </div>
                        @enderror
                        <button type="submit" class="btn_act">Sign up</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection