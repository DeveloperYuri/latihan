<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = ProductModel::all();
        return view('dashboard.crud.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.crud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());

        $validate = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5'
        ]);

        $save = new ProductModel;

        $save->name = trim($request->name);
        $save->description = trim($request->description);
        $save->date = $request->date;
        $save->skill = $request->has('skill') ? implode(',', $request->skill) : null;
        $save->setuju = trim($request->setuju);

        $save->save();

        return redirect()->route('crudindex')->with('success', 'Create Data Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = ProductModel::findOrFail($id);
        $data->skill_array = $data->skill ? explode(',', $data->skill) : [];

        return view('dashboard.crud.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = ProductModel::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->date,
            'skill' => $request->has('skill') ? implode(',', $request->skill) : null,
            'setuju' => $request->setuju,
        ]);

        return redirect()->route('crudindex')->with('success', 'Edit Data Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductModel $id)
    {
        $id->delete();

        return redirect()->route('crudindex')->with('error', 'Delete Data Successfully');
    }
}
