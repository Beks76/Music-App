<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Tag;
use App\Models\Genre;
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
        return view('album.index', compact(['albums', 'genres']));
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
        return view('album.create', compact(['genres', 'tags']));
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
        $album->artist = $request->input('artist');
        $album->year = $request->input('year');
        $album->cover = $request->cover->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$album->cover}"))->fit(265, 265);
        $image->save();
        $album->genre_id = $request->input('genre');
    
        $album->save();

        $album->tags()->sync($request->input('tag'));

        return redirect()->route('backend.index')->with('success', ' Album was added');
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
        return view('album.show', compact('album'));
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
        return view('album.edit', compact(['album', 'gen']));
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
        $album->update($request->only('name', 'artist', 'year', 'genre_id'));
        return redirect()->route('backend.index')->with('success', ' Album was updated successfully with ID: '.$album->id);
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

        return redirect()->route('backend.index')->with('success', ' Album was deleted successfully with ID: '.$album->id);
    }
}
