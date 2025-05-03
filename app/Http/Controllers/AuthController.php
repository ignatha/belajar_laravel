<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Mail\VerifyEmail;
use Carbon\Carbon;
class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function login_store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors(['login' => 'Invalid
        credentials']);

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required',
            'email'    => 'email',
            'username' => 'required',
            'password' => 'required',
        ]);

        $token = Str::random(10);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'verif_token' => $token
        ]);

        Auth::login($user);

        Mail::to($request->email)->send(new VerifyEmail($token));

        return redirect()->route('login');
    }

    public function verif_email($token)
    {
        if (!$token) {
           abort(404);
        }

        $user = Auth::user();

        if(!$user->verif_token){
            return redirect()->route('home')->withErrors('User sudah diverifikasi');
        }

        $checkToken = ($token == $user->verif_token);

        if ($checkToken) {
            $user->email_verified_at = Carbon::now();
            $user->verif_token = null;
            $user->save();
        }

        return redirect()->route('home');
    }

}
