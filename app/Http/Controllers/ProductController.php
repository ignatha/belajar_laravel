<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function __construct(){
        $this->middleware(['auth'])->except(['add']);
    }

    public function index()
    {
        $products = Product::all();

        return view('product.index',compact('products'));
    }

    public function add()
    {
        return view('product.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        if ($validated) {
            Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock
            ]);

            return redirect(route('product.index'));
        }
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        if ($validated) {
            $product = Product::find($id);

            $product->name = $request->name;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->save();

            return redirect(route('product.index'));
        }
    }

    public function detail($id)
    {
        $product = Product::find($id);

        return view('product.detail',compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit',compact('product'));
    }

    public function delete($id)
    {
        $product = Product::destroy($id);

        return redirect(route('product.index'));
    }
}
