<?php

namespace App\Http\Controllers;

use App\Models\ChurchEvent;
use Illuminate\Http\Request;

class ChurchEventController extends Controller
{
    public function index()
    {
        $events = ChurchEvent::all();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'location' => 'nullable|string',
            'organizer' => 'nullable|string',
            'type' => 'nullable|string',
        ]);

        ChurchEvent::create($request->all());

        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    public function edit($id)
    {
        $event = ChurchEvent::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = ChurchEvent::findOrFail($id);

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'start' => 'sometimes|required|date',
            'end' => 'sometimes|required|date|after_or_equal:start',
            'location' => 'nullable|string',
            'organizer' => 'nullable|string',
            'type' => 'nullable|string',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }

    public function destroy($id)
    {
        $event = ChurchEvent::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }
}