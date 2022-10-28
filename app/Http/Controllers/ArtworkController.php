<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artwork;

class ArtworkController extends Controller
{
    public function index()
    {
        $artworks = Artwork::all();
        return view ('artworks.index')->with('artworks', $artworks);
    }

    public function create()
    {
        return view('artworks.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Artwork::create($input);
        return redirect('artwork')->with('flash_message', 'Artwork saved!');
    }

    public function show($id)
    {
        $artwork = Artwork::find($id);
        return view('artworks.show')->with('artworks', $artwork);
    }

    public function edit($id)
    {
        $artwork = Artwork::find($id);
        return view('artworks.edit')->with('artworks', $artwork);
    }

    public function update(Request $request, $id)
    {
        $artwork = Artwork::find($id);
        $input = $request->all();
        $artwork->update($input);
        return redirect('artwork')->with('flash_message', 'Artwork updated!');
    }

    public function destroy($id)
    {
        Artwork::destroy($id);
        return redirect('artwork')->with('flash_message', 'Artwork deleted!');
    }

    public function catalogue()
    {
        $artworks = Artwork::all();
        return view ('artworks.catalogue')->with('artworks', $artworks);
    }
}
