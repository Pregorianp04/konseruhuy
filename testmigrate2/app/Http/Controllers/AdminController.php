<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){

            echo "Halo selamat datang Admin ";
            echo "<h1>". Auth::user()->name."</h1>";
            echo "<a href='/logout'> Logout </a>";
            $data = User::all();
            return view('User')->with('data', $data);

    }

    public function masyarakat(){

        echo "Halo selamat datang Masyarakkat";
        echo "<h1>". Auth::user()->name."</h1>";
        echo "<a href='/logout'> Logout </a>";
        $data = User::all();
        return view('User')->with('data', $data);

}
}
