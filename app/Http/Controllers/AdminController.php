<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Session;

class AdminController extends Controller
{
    public function login(){
        return view('backend.admin_login');
    }

    public function authenticate(Request $request)
    {
    // $credentials = $request->validate([
    //     'email' => ['required', 'email'],
    //     'password' => ['required'],
    // ]);

    // if (Auth::attempt($credentials)) {
    //     $request->session()->regenerate();

    //     return redirect()->intended('/dashboard');
    // }

    // return back()->withErrors([
    //     'email' => 'The provided credentials do not match our records.',
    // ])->onlyInput('email');


    
$email=$request->email;
$password=$request->password;
$result=Admin::where('email',$email)->where('password',$password)->first();

if($result){

    // Session::put('id', $result->id);
    // Session::put('name', $result->name);
    return redirect('/dashboard');
}
else{
    // Session::put('message', 'Invalid info');
    return redirect('/login')->with('message','Invalid Credential!');
    }
}

public function logout(){
    Session::flush();
    return redirect('/');
}






}


    




