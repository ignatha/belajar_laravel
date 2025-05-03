<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Auth;
class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except(['login','login_store']);
    }

    public function index()
    {
        $userAdmin = Admin::all();

        return view('admin.index',compact('userAdmin'));
    }

    public function add()
    {
        return view('admin.add_admin');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.index');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function login_store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])){
            return redirect()->route('admin.index');
        }

        return redirect()->back()->withErrors(['login' => 'Invalid
        credentials']);

    }

    public function logout()
    {

        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
