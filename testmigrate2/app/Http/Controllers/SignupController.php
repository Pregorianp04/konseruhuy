<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function form(){
        return view('Login.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));

        $role = 'masyarakat';
        if (strpos($email, 'admin') !== false) {
            $role = 'admin';
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role,
        ]);

        return redirect()->route('/')->with('success', 'Registrasi berhasil!');
    }
}
