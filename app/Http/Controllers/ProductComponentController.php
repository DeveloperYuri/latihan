<?php

namespace App\Http\Controllers;

use App\Models\ProductComponentModel;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Str;

class ProductComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productcomponent = ProductComponentModel::latest()->paginate(10);

        return view('dashboard.crudcomponent.index', compact('productcomponent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.crudcomponent.create');
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

        $slug = Str::of($request->name)->slug('-');

        ProductComponentModel::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug
        ]);

        return redirect()->route('productcomponent.index')->with('success', 'Create Data Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $productcomponent = ProductComponentModel::where('slug', $slug)->firstorFail();

        return view('dashboard.crudcomponent.show', compact('productcomponent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $productcomponent = ProductComponentModel::where('slug', $slug)->firstorFail();

        return view('dashboard.crudcomponent.edit', compact('productcomponent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $productcomponent = ProductComponentModel::where('slug', $slug)->firstorFail();

        $slug = Str::of($request->name)->slug('-');

        $productcomponent->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug
        ]);

        return redirect()->route('productcomponent.index')->with('success', 'Edit Data Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productcomponent = ProductComponentModel::findorFail($id);

        $productcomponent->delete();

        return redirect()->route('productcomponent.index')->with('success', 'Delete Data Successfully');
    }
}
