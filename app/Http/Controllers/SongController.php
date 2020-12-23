<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Role;
use App\Models\Album;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::all();
        return view('song.index', compact('songs'));
    }

    public function create()
    {
        $albums = Album::all();
        $users = Role::find(3)->users()->get();
        return view ('song.create', compact(['albums', 'users']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'song' => 'file|required'
        ]);

        $album = Album::where('id', $request->album)->first()->name;
        $albumName = explode(' ', trim($album));
        $song = $request->file('song');
        $songExt = $song->getClientOriginalExtension();
        $songName = $request->name . "." .$songExt;
        $path = 'storage'.DIRECTORY_SEPARATOR.'albums'.DIRECTORY_SEPARATOR. $albumName[0];

        $song->move($path, $songName);

        Song::create([
            'album_id' => $request->album,
            'name' => $request->name,
            'url' => $songName
        ]);

        return redirect()->route('song.index')->with('success', 'A new song has been added successfully');

    }

    public function edit($id)
    {
        $song = Song::find($id);
        $albums = Album::all();
        $users = Role::find(3)->users()->get();
        return view('song.edit', compact(['albums', 'song', 'users']));
    }

    public function destroy($id)
    {
        $song = Song::find($id);
        $song->delete();

        return redirect()->route('song.index')->with('success', ' Song was deleted successfully with ID: '.$id);
    }

    public function update(Request $request, $id)
    {   
        $song = Song::find($id);
        $song->update($request->only('name', 'artist', 'album', 'song'));
        return redirect()->route('song.index')->with('success', ' Song was updated successfully with ID: '.$id);
    }

}
