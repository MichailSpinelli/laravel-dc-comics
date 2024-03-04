<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Comic;

class ComicController extends Controller
{
    
    public function index()
    {
        $comics = Comic::all();

        return view('comics.index', compact('comics'));
    }

    public function create()
    {
        return view('comics.create');
    }

    
    public function store(Request $request)
    {
        $comicData = $request->all();

        $comic = new Comic();
        $comic->title = $comicData['title'];
        $comic->description = $comicData['description'];
        $comic->thumb = $comicData['thumb'];
        $comic->price = $comicData['price'];
        $comic->series = $comicData['series'];
        $comic->sale_date = $comicData['sale_date'];
        $comic->type = $comicData['type'];

        $explodedArtists = explode(',' , $comicData['artists']);
        $comic->artists = json_encode($explodedArtists);
        
        $explodedWriters = explode(',' , $comicData['writers']);  
        $comic->writers = json_encode($explodedWriters);

        $validatedData = $request->validate([
            'title'             => 'required|max:64',
            'description'       => 'nullable',
            'thumb'             => 'nullable|max:1024|url',
            'price'             => 'nullable|numeric|min:1|max:1000',
            'series'            => 'nullable|max:64',
            'sale_date'         => 'nullable|date',
            'type'              => 'required|max:64',
            'artists'           => 'required|max:1000|json',
            'writers'           => 'required|max:1000|json',
        ], [
            'title.required' => 'Titolo necessario',
            'title.max' => 'Inserisci un titolo di massimo 64 caratteri'
        ]);
        
        $comic->save();
        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    public function update(Request $request, Comic $comic)
    {
        $comicData = $request->all();

        $explodedArtists = explode(',' , $comicData['artists']);
        $comicData['artists'] = json_encode($explodedArtists);

        $explodedWriters = explode(',' , $comicData['writers']);  
        $comicData['writers'] = json_encode($explodedWriters);

        $validatedData = $request->validate([
            'title'             => 'required|max:64',
            'description'       => 'nullable',
            'thumb'             => 'nullable|max:1024|url',
            'price'             => 'nullable|numeric|min:1|max:1000',
            'series'            => 'nullable|max:64',
            'sale_date'         => 'nullable|date',
            'type'              => 'required|max:64',
            'artists'           => 'required|max:1000|json',
            'writers'           => 'required|max:1000|json',
        ], [
            'title.required' => 'Titolo necessario',
            'title.max' => 'Inserisci un titolo di massimo 64 caratteri'
        ]);

        $comic->fill($comicData);
        $comic->save();

        return redirect()->route('comics.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }
}