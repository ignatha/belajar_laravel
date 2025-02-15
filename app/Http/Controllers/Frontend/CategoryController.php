<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;

class CategoryController extends Controller
{

    public function index(){

        $categories = Category::all();

        return view('category.index',compact('categories'));
    }

    public function add()
    {
        return view('category.add');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required'
        ]);

        if($validated) {
            Category::create([
                'name' => $request->name
            ]);

            return redirect()->route('category.index')->with('success','Data berhasil ditambahkan');
        }

        return view('category.add');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('category.edit',compact('category'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'id'    => 'required'
        ]);

        if($validated) {

            $category = Category::find($request->id);

            $category->name = $request->name;
            $category->save();

            return redirect()->route('category.index')->with('success','Data berhasil diupdate');
        }

        return view('category.edit',compact('category'));
    }

    public function delete($id)
    {
        $category = Category::destroy($id);

        return redirect(route('category.index'))->with('success','Data berhasil dihapus');
    }

}
