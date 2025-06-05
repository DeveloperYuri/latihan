<?php

namespace App\Http\Controllers;

use App\Models\ProductImageSlugModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductImageSlugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productimageslug = ProductImageSlugModel::latest()->paginate(10);

        return view('dashboard.crudimageslug.index', compact('productimageslug'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.crudimageslug.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:5'
        ]);

        $image = $request->file('image');
        $image->storeAs('productimageslug', $image->hashName(), 'public');

        $slug = Str::of($request->name)->slug('-');

        ProductImageSlugModel::create([
            'image' => $image->hashName(),
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug
        ]);

        return redirect()->route('productimageslug.index')->with('success', 'Create Data Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $productimageslug = ProductImageSlugModel::where('slug', $slug)->firstorFail();

        return view('dashboard.crudimageslug.show', compact('productimageslug'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $productimageslug = ProductImageSlugModel::where('slug', $slug)->firstorFail();

        return view('dashboard.crudimageslug.edit', compact('productimageslug'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $productimageslug = ProductImageSlugModel::where('slug', $slug)->firstorFail();

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('productimageslug', $image->hashName(), 'public');

            $slug = Str::of($request->name)->slug('-');

            $productimageslug->update([
                'image' => $image->hashName(),
                'name' => $request->name,
                'description' => $request->description,
                'slug' => $slug
            ]);
        } else {
            $slug = Str::of($request->name)->slug('-');

            $productimageslug->update([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => $slug
            ]);
        }

        return redirect()->route('productimageslug.index')->with('success', 'Edit Data Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productimageslug = ProductImageSlugModel::findorFail($id);

        $productimageslug->delete();

        return redirect()->route('productimageslug.index')->with('success', 'Create Data Successfully');
    }
}
