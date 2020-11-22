<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Tag;
use App\Models\Genre;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        return view('admin.index', compact(['albums', 'genres']));
    }

    public function albumByGenre(Genre $genre)
    {
        $albums = Album::where('genre_id', $genre->id)->get();
        $genres = Genre::all();
        return view('admin.index', compact(['albums', 'genres']));
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
        return view('admin.create', compact(['genres', 'tags']));
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
        $album->cover = $request->input('cover');
        $album->genre_id = $request->input('genre');
        $album->save();

        $album->tags()->sync($request->input('tag'));

        return redirect()->route('backend.index')->with('success', ' Album was added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show($album)
    {
        $album = Album::find($album);
        return view('admin.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($album)
    {
        $album = Album::find($album);
        $gen = Genre::all();
        return view('admin.edit', compact(['album', 'gen']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $album)
    {
        $album = Album::find($album);
        $album->update($request->only('name', 'artist', 'year', 'genre_id'));
        return redirect()->route('backend.index')->with('success', ' Album was updated successfully with ID: '.$album->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($album)
    {
        $tag = new Tag();
        $album = Album::find($album);
        $album->tags()->detach($tag->id);
        $album->delete();

        return redirect()->route('backend.index')->with('success', ' Album was deleted successfully with ID: '.$album->id);
    }
}
