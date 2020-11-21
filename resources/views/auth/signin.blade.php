@extends('layouts.head')


@section('content')

<section id="signin" class="signin">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="formsign">
                    <p class="formsign__offer">
                        Log in
                    </p>
                    <div class="btns d-flex justify-content-between">
                        <button class="formsign__btnb"> <i class="fa fa-apple"></i> Apple</button>
                        <button class="formsign__btnb"> <i class="fa fa-facebook"></i> Facebook</button>
                    </div>
                    
                    <form action="{{ route('auth.postSignin') }}" method="post">
                        @csrf
                        <input type="text" class="formsign__input" name="email" placeholder="Email address">
                        @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}  
                            </div>
                        @enderror
                        <input type="password" class="formsign__input" name="password" placeholder="Password">
                        @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}  
                            </div>
                        @enderror
                        <div class="form-check">
                            <input class="form-check-input" name="remember" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Remember me</label>
                        </div>
                        <button type="submit" class="btn_act">Log in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection