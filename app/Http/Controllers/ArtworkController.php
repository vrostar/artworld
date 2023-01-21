<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Artwork;

class ArtworkController extends Controller
{
    public function index()
    {
        $artworks = Artwork::all();
        $categories = Category::all();
        return view('artworks.index', compact('artworks', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('artworks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        //Merge request to data
        $data = $request->all();
        $request->merge($data);

        //Validate request
        $validated = $this->validate($request,
            [
                'name' => 'bail|required|max:255',
                'artist' => 'bail|required|max:255',
                'description' => 'nullable',
                'year' => 'bail|required|numeric',
                'price' => 'bail|required|numeric',
                'category_id' => 'bail|required',
                'category_id.*' => 'bail|numeric|min:1|exists:categories,id'
            ]);
        //Add and redirect
        $artwork = Artwork::create($validated);
        $artwork->categories()->attach($validated['category_id']);
        session()->flash('alert', 'Artwork successfully added.');
        return redirect('/catalogue');
    }

    public function show($id)
    {
        $artworks = Artwork::find($id);
        return view('artworks.show')->with('artworks', $artworks);
    }

    public function edit($id)
    {
        $artworks = Artwork::find($id);
        $categories = Category::all();
        $selectedCategories = $artworks->categories;
        return view('artworks.edit', compact('artworks', 'categories', 'selectedCategories'));
    }

    public function update(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:artworks',
                'name' => 'bail|required|max:255',
                'artist' => 'bail|required|max:255',
                'description' => 'nullable',
                'year' => 'bail|required|numeric',
                'price' => 'bail|required|numeric',
                'category_id' => 'bail|required',
                'category_id.*' => 'bail|numeric|min:1|exists:categories,id'
            ]);
        $artwork = Artwork::find($validated['id']);
        $artwork->name = $validated['name'];
        $artwork->artist = $validated['artist'];
        $artwork->description = $validated['description'];
        $artwork->year = $validated['year'];
        $artwork->price = $validated['price'];
        $artwork->save();
        $artwork->categories()->sync($validated['category_id']);
        return redirect(route('artworks.show', $artwork->id));
    }

    public function destroy($id)
    {
        Artwork::destroy($id);
        return redirect('artwork')->with('flash_message', 'Artwork deleted!');
    }

    public function catalogue()
    {
        $artworks = Artwork::all();
        $categories = Category::all();
        return view('artworks.catalogue', compact('artworks', 'categories'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        // Get the search value from the request
        $search = $request->input('search');
        $searchCategories = $request->input('searchCategory');
        $artworks = null;

        // Search in the title and body columns from the artworks table
        if (!$search == null) {
            $artworks = Artwork::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('artist', 'LIKE', "%{$search}%")
                ->get();
        }

        if (!$searchCategories == null) {
            $i = 0;
            foreach ($searchCategories as $searchCategory)
                if ($i === 0) {
                    $i++;
                    $artworks = Artwork::query()
                        ->where('name', 'LIKE', "%{$search}%")
                        ->whereRelation('categories', 'categories.id', 'LIKE', "%{$searchCategory}%")
                        ->get();
                } elseif ($i > 0) {
                    $artworks = Artwork::query()
                        ->where('name', 'LIKE', "%{$search}%")
                        ->WhereRelation('categories', 'categories.id', 'LIKE', "%{$searchCategory}%")
                        ->get();
                }

        }

        // Return the search view with the results compacted
        return view('search', compact('artworks', 'categories'));
    }

    public function toggleActive($id)
    {
        $artworks = Artwork::find($id);
        $artworks->active= !$artworks->active;
        $artworks->save();
        session()->flash('alert', 'Toggled Artwork!');

        return redirect(route('artwork.index'));
    }
}
