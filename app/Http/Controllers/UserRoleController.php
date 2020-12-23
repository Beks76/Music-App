<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('user.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artist = new Artist();

        $user = new User();
        $user->first_name = $request->input('fname');
        $user->last_name = $request->input('lname');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->username = $request->input('username');
        $user->save();

        if($request->input('role') == 3) {
            $artist->bio = 'N/A';
            $artist->user_id = $user->id;
            $artist->save();
        }

        $user->roles()->sync($request->input('role'));

        return redirect()->route('user.index')->with('success', ' User was added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        return view('user.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        $role = Role::all();
        return view('user.edit', compact(['users', 'role']));
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
        $artist = new Artist();

        $user = User::find($id);
        $user->update($request->only('fname', 'lname', 'email', 'role'));
        $user->roles()->attach($request->only('role'));

        if($request->input('role') == 3) {
            $artist->bio = 'N/A';
            $artist->user_id = $user->id;
            $artist->save();
        }

        return redirect()->route('user.index')->with('success', ' User was updated successfully with ID: '.$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = new Role();
        $user = User::find($id);
        $user->roles()->detach($role->id);
        $user->delete();

        $artist = new Artist();
        $artist = Artist::where('user_id', $id)->first();
        if ($artist != null) {
            $artist->delete();
            return redirect()->route('user.index')->with('success', ' User was deleted successfully with ID: '.$user->id);
        }
        return redirect()->route('user.index')->with('success', ' User was deleted successfully with ID: '.$user->id);
    }

    public function destroyRole(Request $request, $id)
    {
        $role = new Role;
        $users = User::find($request->input('userid'));
        $users->roles()->detach($id);

        $artist = new Artist();
        $artist = Artist::where('user_id', $id)->first();
        if ($artist != null) {
            $artist->delete();
            return redirect()->route('user.show', $users->id)->with('success', ' Role of user was deleted. User id: '.$users->id);
        }

        return redirect()->route('user.show', $users->id)->with('success', ' Role of user was deleted. User id: '.$users->id);
    }
}
