<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('product.index');
    }

    public function fetch()
    {

        $product = Product::query();

        return DataTables::of($product)
        ->editColumn('tumbnail', function($product){
            $url = \App\Helpers\SiteHelper::getUrlImage($product->tumbnail);
            return "<img src='{$url}' ></img>";
        })
        ->addColumn('action', function ($product) {
            $detail = "<a href='javascript:void(0)' onclick='getDetail(".$product->id.")' class='btn btn-primary'>Detail</a>";
            $edit = "<a href='javascript:void(0)' onclick='showModalEdit(".$product->id.")' class='btn btn-secondary'>Edit</a>";

            $delete = "<form action=".route('product.delete',['id'=>$product->id])." method='post'>
                        ".csrf_field()."
                        <input type='hidden' name='_method' value='delete'>
                        <input type='submit' value='Delete' class='btn btn-accent'>
                    </form>";

            return $detail.$edit.$delete;
        })
        ->addIndexColumn()
        ->rawColumns(['tumbnail','action'])
        ->make(true);
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
            'tumbnail' => ['required']
        ]);

        $name = $this->getName($request->file('tumbnail'));

        $path = $request->file('tumbnail')->storeAs('tumbnail',$name,'r2');

        if ($validated) {
            Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'tumbnail' => $path,
                'user_id'   => 1,
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

            return response()->json([
                'success' => "Success"
            ]);
        }
    }

    public function detail($id)
    {
        $product = Product::where('id',$id)->first();

        return response()->json($product);
        // return view('product.detail',compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit',compact('product'));
    }

    public function delete($id)
    {
        // ambil data record base id
        $product = Product::find($id);

        if ($product->tumbnail != null) {
            // hapus gambar yang sebelumnya
            Storage::disk('r2')->delete($product->tumbnail);
        }


        Product::destroy($id);

        return redirect(route('product.index'));
    }

    public function getName($file){
        $originalName = $file->getClientOriginalName(); // boneka lucu.webp
        $nameWithoutExtension = pathinfo($originalName,PATHINFO_FILENAME);

        $resultName = Str::slug($nameWithoutExtension); // boneka-lucu
        $resultName .= '-'.Str::random(6);
        $resultName .= '.'.$file->getClientOriginalExtension();

        return $resultName;
    }

    public function session(Request $request)
    {
        $request->session()->put('satu','ini isi dari satu');

        return session('satu');
    }
}
