<?php

namespace App\Http\Controllers;

use App\Models\ProductImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CrudImageController extends Controller
{
    public function index()
    {

        $productimage = ProductImageModel::paginate(10);
        return view('dashboard.crudimage.index', compact('productimage'));
    }

    public function create()
    {
        return view('dashboard.crudimage.create');
    }

    public function store(Request $request)
    {

        $image = $request->file('image');
        $image->storeAs('productimage', $image->hashName(), 'public');

        ProductImageModel::create([
            'image' => $image->hashName(),
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('crudimageindex')->with('success', 'Create Data Image Successfully');
    }

    public function edit(string $id)
    {
        $productimage = ProductImageModel::findorFail($id);

        return view('dashboard.crudimage.edit', compact('productimage'));
    }

    public function update(Request $request, string $id)
    {
        $productimage = ProductImageModel::findorFail($id);

        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('productimage', $image->hashName(), 'public');

            //delete old image
            Storage::delete('storage/productimage/' . $productimage->image);

            $productimage->update([
                'image' => $image->hashName(),
                'name'  => $request->name,
                'description' => $request->description
            ]);
        } else {
            $productimage->update([
                'name' => $request->name,
                'description' => $request->description
            ]);
        }

        return redirect()->route('crudimageindex')->with('success', 'Edit Data Successfully');
    }

    public function destroy(string $id)
    {
        $productimage = ProductImageModel::findorFail($id);

        $productimage->delete();

        return redirect()->route('crudimageindex')->with('success', 'Delete Data Succesfully');
    }
}
