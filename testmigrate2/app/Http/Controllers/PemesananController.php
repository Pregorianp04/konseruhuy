<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pemesanan;
use App\Models\Kategori;
use App\Models\Event;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        // Ambil ID user saat ini
        $userId = auth()->user()->id;

        // Ambil pemesanan berdasarkan ID user
        $pemesananUser = Pemesanan::where('id_user', $userId)->get();

        // Ambil semua data dari tabel pemesanan, event, dan user
        $pemesanans = Pemesanan::all();
        $events = Event::all();
        $users = User::all();

        // Tampilkan halaman dengan passing data yang diambil
        return view('masyarakat.pemesanan.riwayat', compact('pemesananUser', 'pemesanans', 'events', 'users'));
    }

    public function indexAdmin(){
        $users=User::all();
        $pemesanans=Pemesanan::all();
        $events = Event::all();
        return view(('admin.Pemesanan.index'),compact('users','pemesanans','events'));
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        if (Event::where('id_event', $id)->exists()) {
            $events = Event::with('kategori')->findOrFail($id);
            $kategoris = $events->kategori;
            $user = auth()->user();

            return view('masyarakat.pemesanan.index', compact('events', 'kategoris', 'user'));
        }
        else {
            return redirect()->back()->with('error', 'Event tidak ditemukan.');
        }
    }

    public function createUser($id)
    {
       $users= User::findOrFail($id);
       return view('masyarakat.pemesanan.userData')->with('users',$users);
    }
    /**
     * Store a newly created resource in storage.
     */


//FIX
    public function store(Request $request)
{
    //Validasi role
    if (auth()->user()->role !== 'masyarakat') {
        return redirect()->route('home')->with('error', 'Only users with role "masyarakat" can make bookings.');
    }

    $validatedData = $request->validate([
        'jumlah_pemesanan' => 'required|integer|min:1',
        'total_harga'=> 'required|integer',
        'id_event' => 'required|exists:events,id_event',
        'id_user' => 'required|exists:users,id',
    ]);

    $event = Event::findOrFail($validatedData['id_event']);
    $user = User::findOrFail($validatedData['id_user']);
    // Validasi kuota
    if ($validatedData['jumlah_pemesanan'] > $event->kuota_event) {
        return redirect()->back()->with('error', 'Not enough tickets available for booking.');
    }

    // Simpan pemesanan ke database
    $pemesanan = new Pemesanan();
    $pemesanan->id_user = auth()->user()->id;
    $pemesanan->id_event = $event->id_event;
    $pemesanan->jumlah_pemesanan = $validatedData['jumlah_pemesanan'];
    $pemesanan->total_harga=$validatedData['total_harga'];
   $pemesanan->save();


  $event->kuota_event -= $validatedData['jumlah_pemesanan'];
   $event->save();

   return redirect()->route('pemesanan.create2', $user->id)->with('success', 'Booking successful.');


}

// FIX
 public function store2(Request $request)
 {
     $validatedData = $request->validate([
         'name' => 'required|string',
         'email' => 'required|email',
         'no_ktp' => 'required|string',
         'no_telp' => 'required|string',
         'id_user' => 'required|exists:users,id',

     ]);

     $user = User::findOrFail($validatedData['id_user']);
     $user->name = $validatedData['name'];
     $user->email = $validatedData['email'];
     $user->no_ktp = $validatedData['no_ktp'];
     $user->no_telp = $validatedData['no_telp'];
     $userSaved = $user->save();

     if ($userSaved) {



        return redirect()->route('masyarakat.index')->with('success', 'Booking successful.');
    } else {
        return redirect()->route('masyarakat.index')->with('error', 'Failed to save booking.');
    }

 }


// TES 2 FORMULIR
// public function store(Request $request)
// {
//     // Validasi role pengguna
//     // if (auth()->user()->role !== 'masyarakat') {
//     //     return redirect()->route('home')->with('error', 'Only users with role "masyarakat" can make bookings.');
//     // }

//     $validatedData = $request->validate([
//         'name' => 'required|string',
//         'email' => 'required|email',
//         'no_ktp' => 'required|string',
//         'no_telp' => 'required|string',
//         'jumlah_pemesanan' => 'required|integer|min:1',
//         'id_event' => 'required|exists:events,id_event',
//         'id_user' => 'required|exists:users,id',
//     ]);

//     $event = Event::findOrFail($validatedData['id_event']);

//     // Validasi kuota tersedia
//     if ($validatedData['jumlah_pemesanan'] > $event->kuota_event) {
//         return redirect()->back()->with('error', 'Not enough tickets available for booking.');
//     }

//     $user = User::where('email', $validatedData['email'])->first();

// if (!$user) {
//     // Pengguna dengan email tidak ditemukan
//     return redirect()->back()->with('error', 'User not found.');
// }

// // Lanjutkan dengan pemrosesan jika pengguna ditemukan
// $user->name = $validatedData['name'];
// $user->no_ktp = $validatedData['no_ktp'];
// $user->no_telp = $validatedData['no_telp'];
// $userSaved=$user->save();
// dd($userSaved);


//     // Simpan pemesanan ke database
//     $pemesanan = new Pemesanan();
//     $pemesanan->id_user = auth()->user()->id;
//     $pemesanan->id_event = $event->id_event;
//     $pemesanan->jumlah_pemesanan = $validatedData['jumlah_pemesanan'];
//     $pemesananSaved=$pemesanan->save();
//     dd($pemesananSaved);



//   $event->kuota_event -= $validatedData['jumlah_pemesanan'];
//    $eventSaved= $event->save();
//    dd($eventSaved);
//   // return redirect()->route('pemesanan.create', $event->id_event)->with('success', 'Booking successful.');


// }

}

