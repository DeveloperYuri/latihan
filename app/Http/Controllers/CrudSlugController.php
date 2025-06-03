<?php

namespace App\Http\Controllers;

use App\Models\ProductSlugModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CrudSlugController extends Controller
{
    public function index(){
        $productslug = ProductSlugModel::paginate(10);

        return view('dashboard.crudslug.index', compact('productslug'));
    }

    public function create(){
        return view('dashboard.crudslug.create');
    }

    public function store(Request $request){

        $validate = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
        ]);

        $slug = Str::of($request->name)->slug('-');

        ProductSlugModel::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
        ]);

        return redirect()->route('crudslugindex')->with('success', 'Create Data Succesfully');
    }

    public function edit(string $slug){
        $productslug = ProductSlugModel::where('slug', $slug)->firstorFail();

        return view('dashboard.crudslug.edit', compact('productslug'));
    }

    public function update(Request $request, string $slug){
        $productslug = ProductSlugModel::where('slug', $slug)->firstorFail();

        $slug = Str::of($request->name)->slug('-');

        $productslug->update([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description
        ]);

        return redirect()->route('crudslugindex')->with('success', 'Edit Data Successfully');

    }

    public function show(string $slug){
        $productslug = ProductSlugModel::where('slug', $slug)->firstorFail();

        return view('dashboard.crudslug.show', compact('productslug'));
    }

    public function destroy(string $id){
        $productslug = ProductSlugModel::findorFail($id);

        $productslug->delete();

        return redirect()->route('crudslugindex')->with('success', 'Delete Data Successfully');
    }
}
