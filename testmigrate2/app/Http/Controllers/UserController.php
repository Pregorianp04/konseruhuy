<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Pemesanan;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('userAkses:admin')->only(['indexAdmin']);
        $this->middleware('userAkses:masyarakat')->only(['masyarakat']);
    }

    // public function detail($id)
    // {
    //     $data = User::findOrFail($id);
    //     return view('show')->with('data', $data);
    // }

    public function edit($id){
        $users=User::findOrFail($id);
        return view('masyarakat.profile.edit')->with('users',$users);
    }

    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'no_ktp' => 'required',


        ]);
        $users=User::findOrFail($id);
        $users->update($validatedData);
        return redirect()->route('profile.index')->with('success','Profile berhasil di edit');
    }

    public function index(){
        $data = User::all();
        return view('admin.user.index')->with('data',$data);
    }

    public function profile(){
        $users = auth()->user();
        return view('masyarakat.profile.index')->with('users',$users);
    }

    public function indexAdmin()
    {
        $data = User::all();

        $totalUser = User::count();


        $totalEvent = Event::count();


        $totalKategori = Kategori::count();


        $totalPemesanan = Pemesanan::count();

        $totalHargaPemesanan = Pemesanan::sum('total_harga');

        return view('admin.dashboard', compact('data','totalUser', 'totalEvent', 'totalKategori', 'totalPemesanan', 'totalHargaPemesanan'));
    }


    public function masyarakat()
    {
        $events = Event::with('kategori')->get();
        $users = auth()->user();

        return view('masyarakat.Landingpage', compact('events', 'users'));
    }

}
