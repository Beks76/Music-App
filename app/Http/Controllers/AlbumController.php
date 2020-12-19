<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Tag;
use App\Models\Genre;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();
        $genres = Genre::all();
        $users = User::all();
        return view('album.index', compact(['albums', 'genres', 'users']));
    }

    public function albumByGenre(Genre $genre)
    {
        $albums = Album::where('genre_id', $genre->id)->get();
        $genres = Genre::all();
        return view('album.index', compact(['albums', 'genres']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        $tags = Tag::all();
        $users = User::all();
        return view('album.create', compact(['genres', 'tags', 'users']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $album = new Album();
        $album->name = $request->input('name');
        $album->user_id = $request->input('artist');
        $album->year = $request->input('year');
        $album->cover = $request->cover->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$album->cover}"))->fit(265, 265);
        $image->save();
        $album->genre_id = $request->input('genre');

        $album->save();

        $album->tags()->sync($request->input('tag'));

        return redirect()->route('album.index')->with('success', ' Album was added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);
        $user = User::where('id', $album->user_id)->first();
        $albumName = explode(' ', trim($album->name));
        foreach ($album->songs as $song) {
            $file = new mp3Controller("storage/albums/".$albumName[0]."/".$song->url);
            $duration = $file->getDuration();
            $length = mp3Controller::formatTime($duration);
            $song['length'] = $length;
        }
        return view('album.show', compact(['album', 'user']));
    }

    public function listen($id)
    {
        $album = Album::find($id);
        $albumName = explode(' ', trim($album->name));
        foreach ($album->songs as $song) {
            $file = new mp3Controller("storage/albums/".$albumName[0]."/".$song->url);
            $duration = $file->getDuration();
            $length = mp3Controller::formatTime($duration);
            $song['length'] = $length;
        }
        return view('album.listen', compact(['album', 'albumName']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);
        $gen = Genre::all();
        $tags = Tag::all();
        $users = User::all();
        return view('album.edit', compact(['album', 'gen', 'tags', 'users']));
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
        $album = Album::find($id);
        $album->update($request->only('name', 'user_id', 'year', 'genre_id'));
        $album->tags()->attach($request->only('tag'));
        return redirect()->route('album.index')->with('success', ' Album was updated successfully with ID: '.$album->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = new Tag();
        $album = Album::find($id);
        $album->tags()->detach($tag->id);
        $album->delete();

        return redirect()->route('album.index')->with('success', ' Album was deleted successfully with ID: '.$album->id);
    }
}
