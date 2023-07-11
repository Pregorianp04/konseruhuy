<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\View\View;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::all();
        return view('admin.event.index')->with('event', $event);;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $input = $request->all();
        Event::create($input);
        return redirect('event')->with('flash_message', 'Success Input!');  
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $id)
    {
        $validatedData = $request->validate([
            'nama_event' => 'required|max:30',
            'tgl_event' => 'required|date',
            'gambar_event' => 'required|max:100',
            'deskripsi_event' => 'required|max:20',
            'lokasi_event' => 'required|max:100',
            'kuota_event' => 'required|integer',
            'eli' => 'required|max:1',
            'identifier' => 'nullable|integer',
        ]);

        $event = Event::findOrFail($id);
        $event->update($validatedData);

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('event')->with('success', 'Event deleted successfully.');
    }
}
