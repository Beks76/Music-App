<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Plans;
use App\Models\User;
use App\Models\Artist;
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
        
        $albums =$user->albums()->get();

        if($user->hasAnyRole('artist'))
        {   
            $followersCount = $user->artist->followers->count();
            return view('profiles.index', compact(['albums', 'user', 'followersCount']));
        }
        
        $plans = Plans::get();
        $sub = Auth::user()->stripe_id;
        return view('profiles.index', compact(['albums', 'user', 'sub', 'plans']));
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


}

