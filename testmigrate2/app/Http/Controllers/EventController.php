<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Kategori;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $events = Event::with('kategori')->paginate(3);
        return view('admin.event.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $kategoris = Kategori::all();

    return view('admin.event.create', compact('kategoris'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama_event' => 'required|max:100',
        'id_kategori' => 'required|exists:kategoris,id_kategori',
        'tgl_event' => 'required|date',
        'gambar_event' => 'nullable|image|max:2048',
        'deskripsi_event' => 'required|max:1000',
        'lokasi_event' => 'required|max:100',
        'harga_event' => 'required|numeric',
        'kuota_event' => 'required|integer',
    ]);

    if ($request->hasFile('gambar_event')) {
        $gambar = $request->file('gambar_event')->getClientOriginalName();
        $request->file('gambar_event')->move('gambarEvent/', $gambar);
        $validatedData['gambar_event'] = $gambar;
    }

    if (Event::create($validatedData)) {
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to create event. Please try again.');
    }
}


    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $data=Event::where('id_event',$id)->first();
        return view('admin.event.show')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $kategoris = Kategori::all();
        return view('admin.event.edit', compact('event', 'kategoris'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nama_event' => 'required|max:100',
        'id_kategori' => 'required|exists:kategoris,id_kategori',
        'tgl_event' => 'required|date',
        'gambar_event' => 'required|max:100',
        'deskripsi_event' => 'required|max:1000',
        'lokasi_event' => 'required|max:100',
        'kuota_event' => 'required|integer',

    ]);

    $event = Event::findOrFail($id);

    // Periksa apakah ada file gambar baru yang diunggah
    if ($request->hasFile('gambar_event')) {
        // Hapus gambar lama (opsional, tergantung kebutuhan Anda)
        // Jika ingin menghapus gambar lama, gunakan perintah berikut:
        Storage::delete($event->gambar_event);

        // Unggah gambar baru dan simpan nama file ke dalam variabel $gambar
        $gambar = $request->file('gambar_event')->getClientOriginalName();
        $request->file('gambar_event')->move(public_path().'/gambarEvent', $gambar);

        // Setel nama file gambar yang baru
        $validatedData['gambar_event'] = $gambar;
    }

    $event->update($validatedData);
    $event->kategori()->associate($request->input('id_kategori')); // kategori yang dipilih
    $event->save();

    return redirect()->route('events.index')->with('success', 'Event updated successfully.');
}



    /**
     * Remove the specified resource from storage.
     * DELETE
     */
    public function destroy($id)
{
    $event = Event::findOrFail($id);

    // Hapus relasi yang terkait
    $event->kategori()->dissociate();


    $event->save();
    $event->delete();

    return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
}

}
