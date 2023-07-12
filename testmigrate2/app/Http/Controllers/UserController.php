<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $data= User::all();
        return view('User')->with('data',$data);
    }

    public function detail($id){
        $data = User::where ('id',$id)->first();
        return view('show')->with('data',$data);
    }
    public function indexAdmin(){

        echo "Halo selamat datang Admin ";
        echo "<h1>". Auth::user()->name."</h1>";
        echo "<a href='/logout'> Logout </a>";
        $data = User::all();
        return view('User')->with('data', $data);

}

public function masyarakat(){

    // echo "Halo selamat datang Masyarakkat";
    // echo "<h1>". Auth::user()->name."</h1>";
    // echo "<a href='/logout'> Logout </a>";
    // $data = User::all();
    // return view('User')->with('data', $data);

    return view('user.Landingpage');

}
}
