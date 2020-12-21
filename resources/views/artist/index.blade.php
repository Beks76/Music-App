@extends('layouts.head')

@section('title', 'Artists')

@section('content')

    <div class="container">
        <div class="artists mt-4 mb-4">
            <h3>Artists:</h3>
            @foreach ($users as $user)
                @if ($user->hasAnyRole('artist'))
                    <div class="artist mt-4">
                        <img src="https://image.flaticon.com/icons/png/128/3011/3011270.png" alt="logo">
                        <a class="ml-4" href="{{ route('profile.index', $user->username) }}" >{{ $user->username }}  🎤</a>    
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
