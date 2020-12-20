<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Plans;
use App\Models\User;
use App\Models\Genre;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($username)
    {
        $user = User::where('username', $username)->first();
        if(!$user) {
            return abort(404);
        }

        $plans = Plans::get();
        $sub = Auth::user()->stripe_id;
        $role = Auth::user()->roles()->get()->first();


        if(request()->category) {
            if(request()->category == 'albums') {
                $albums = $user->albums()->get();
                if($user->hasAnyRole('artist'))
                {
                    $followersCount = $user->artist->followers->count();
                    return view('profiles.index', compact(['user', 'sub', 'plans', 'role', 'followersCount', 'albums']));
                }
        
                return view('profiles.index', compact(['user', 'sub', 'plans', 'role', 'albums']));
            }
            elseif(request()->category == 'artists') {
                $id = $user->following()->get()->pluck('user_id');
                $followings = User::find($id);
                if($user->hasAnyRole('artist'))
                {
                    $followersCount = $user->artist->followers->count();
                    return view('profiles.index', compact(['user', 'sub', 'plans', 'role', 'followersCount', 'followings']));
                }
        
                return view('profiles.index', compact(['user', 'sub', 'plans', 'role', 'followings']));
            }
            else {
                $artist_albums = Album::where('user_id', $user->id)->get();
                if($user->hasAnyRole('artist'))
                {
                    $followersCount = $user->artist->followers->count();
                    return view('profiles.index', compact(['user', 'sub', 'plans', 'role', 'followersCount', 'artist_albums']));
                }
        
                return view('profiles.index', compact(['user', 'sub', 'plans', 'role', 'artist_albums']));
            }
        }

        if($user->hasAnyRole('artist'))
        {
            $followersCount = $user->artist->followers->count();
            return view('profiles.index', compact(['user', 'sub', 'plans', 'role', 'followersCount']));
        }

        return view('profiles.index', compact(['user', 'sub', 'plans', 'role']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function like($id)
    {
        $album = Album::find($id);
        $album->users()->sync(Auth::user()->id);

        return redirect()->route('album.show', $id);
    }

    public function follow($id)
    {
        $user = User::find($id);
        Auth::user()->following()->toggle($user->artist);

        return redirect()->route('profile.index', $user->username);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('profiles.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->only('username', 'email', 'first_name', 'last_name', 'location'));
        return redirect()->route('profile.index', $user->username);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete_album($id)
    {
        $user = new User();
        $album = Album::find($id);
        $album->users()->detach($user->id);

        return redirect()->route('album.show', $id);
    }


    // Artist

    public function station($username)
    {
        return view('artist.station');
    }

    public function artists()
    {
        $users = User::all();
        return view('artist.index', compact('users'));
    }

    public function album_create()
    {
        $genres = Genre::all();
        $tags = Tag::all();
        return view('artist.album_create', compact(['genres', 'tags']));
    }

    public function album_edit($username, $id)
    {
        $album = Album::find($id);
        $gen = Genre::all();
        $tags = Tag::all();
        $user = User::where('username', $username)->first();

        return view('artist.album_edit', compact(['album', 'gen', 'tags', 'user']));
    }

    // public function song_create($username)
    // {
    //     $user = User::where('username', $username)->first();
    //     $albums = Album::all();

    //     return view('artist.song_create', compact(['user', 'albums']));
    // }

}

