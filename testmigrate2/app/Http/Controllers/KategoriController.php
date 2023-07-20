<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris=Kategori::all();
        return view('admin.kategori.index')->with('kategoris',$kategoris);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:100',
        ]);

        $kategori = Kategori::create($validatedData);

        if ($kategori) {
            return redirect()->route('kategori.index')->with('success', 'Kategori created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create kategori.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $data=Kategori ::where('id_kategori',$id)->first();
        return view('admin.kategori.show')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:100',

        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($validatedData);
        return redirect()->route('kategori.index')->with('success', 'Kategori updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id )
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori deleted successfully.');
    }
}
