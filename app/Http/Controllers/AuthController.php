<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Auth;
class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function proses(Request $request){
        // dd($request->all());
        if(Auth::attempt($request->only('username','password'))){
            return redirect('/dashboard');
        }
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
