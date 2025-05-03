<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

use App\Models\{User, Product, Admin};

class UserController extends Controller
{
    public function index()
    {

        // $users = DB::table('users')->where('id',476)->first();

        // $users = DB::table('users')->where('id',476)->value('email');

        // $users = DB::table('users')->find(476);


        // $users = DB::table('users')->pluck('name');

        // dd($users);

        // DB::table('users')->orderBy('id')->chunk(100, function (Collection $users) {
        //     foreach ($users as $user) {
        //         echo $user->name.'<br>';

        //     }


        // });

        // $users = DB::table('users')->count();

        // $users = DB::table('users')->where('id',476)->first();

        // if(!$users){
        //     dd('oke ada');
        // }

        // $user = DB::table('users')
        // ->selectRaw('count(*) as jumlah')
        // ->get();

        // $user = DB::table('users')
        // ->whereRaw('id = ? AND email = ?',[476,'stokes.nyasia@example.net'])
        // ->get();

        // $join = DB::table('users')
        //     ->join('products', 'users.id', '=', 'products.user_id')
        //     ->select('users.*', 'products.*')
        //     ->get();

        // $leftJoin = DB::table('users')
        //     ->leftJoin('products', 'users.id', '=', 'products.user_id')
        //     ->select('users.*', 'products.*')
        //     ->get();

        // dd([$join,$leftJoin]);

        // $users = DB::table('users')->where('id','=',467)->where('email','=','stokes.nyasia@example.net');

        // $users = DB::table('users')->where(function($query){
        //     $query->where('id',467)->where('name','Edmond Schneider');
        // })->orWhere(function($query){
        //     $query->where('id',467)->where('name','Edmond Schneider');
        // });

        // $users = DB::table('users')->whereNot(function($query){
        //     $query->where('id',467)->where('name','Edmond Schneider');
        // })->orWhere(function($query){
        //     $query->where('id',467)->where('name','Edmond Schneider');
        // });

        // $users = DB::table('users')->whereIn('id',[1,2,3])->orderBy('email','asc')->orderBy('name','asc')->get();

        // $users = DB::table('users')
        //         ->groupBy('created_at')
        //         ->get();

        // dd($users);

        return 'oke';
    }

    public function db()
    {

        $users = Admin::all(); // langsung objek bukan array

        dd($users);

        return view('user.index',compact('users'));

        // $product = Product::with(['user'])->get();



    }


}
