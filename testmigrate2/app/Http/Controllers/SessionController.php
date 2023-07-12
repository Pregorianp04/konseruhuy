<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index(){
        return view('Login.login');
    }

    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],
    [
        'email.required'=>'Email wajib diisi',
        'password.required'=>'Password wajib diisi'
    ]);


    $infologin = [
        'email'=>$request->email,
        'password'=>$request->password
    ];

    if(Auth::attempt($infologin)){
        // kalau autentikasi sukses
        if(Auth::user()->role=='masyarakat'){
            return redirect('/masyarakat');
        }
        elseif(Auth::user()->role=='admin'){
            return redirect('/admin');
        echo "sukses";
        exit();
        }

    }else{
        //kalau autentikasi gagal
        return redirect('')->withErrors("Email dan Password Salah")->withInput();
    }
}

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
