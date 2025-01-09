<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index($id)
    {
        $product = Product::find(1);

        dd($product);

        Product::create([
            'name' => 'produk 2'
        ]);

        return view('product.index',['data'=>$id]);
    }
}
