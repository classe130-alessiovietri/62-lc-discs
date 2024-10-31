<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\{
    Album,
    Artist,
    Genre
};

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::get();

        return view('admin.albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $artists = Artist::get();
        $genres = Genre::get();

        return view('admin.albums.create', compact('artists', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:64',
            'artist_id' => 'required|exists:artists,id',
            'genres' => 'nullable|array|exists:genres,id',
        ]);

        $data['slug'] = str()->slug($data['name']);

        $album = Album::create($data);

        $album->genres()->sync($data['genres'] ?? []);

        return redirect()->route('admin.albums.show', ['album' => $album->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return view('admin.albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        $artists = Artist::get();
        $genres = Genre::get();

        return view('admin.albums.edit', compact('album', 'artists', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $data = $request->validate([
            'name' => 'required|max:64',
            'artist_id' => 'required|exists:artists,id',
            'genres' => 'nullable|array|exists:genres,id',
        ]);

        $data['slug'] = str()->slug($data['name']);

        $album->update($data);

        $album->genres()->sync($data['genres'] ?? []);

        return redirect()->route('admin.albums.show', ['album' => $album->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return redirect()->route('admin.albums.index');
    }
}
