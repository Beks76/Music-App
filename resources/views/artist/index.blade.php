@extends('layouts.head')

@section('title', 'Artists')

@section('content')

    <div class="container">
        <div class="artists mt-4 mb-4">
            @foreach ($users as $user)
                @if ($user->hasAnyRole('artist'))
                    <a href="{{ route('profile.index', $user->username) }}" >{{ $user->username }}</a>    
                @endif
            @endforeach
        </div>
    </div>
@endsection
