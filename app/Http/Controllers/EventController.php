<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.dashboard', compact('events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'description' => 'nullable|string',
            'rsvp_limit' => 'nullable|integer',
        ]);

        $validated['user_id'] = auth()->id(); 

        Event::create($validated);

        return redirect()->route('admin.index')->with('success', 'Event created!');
    }

   

    public function create()
{
    return view('admin.events.create');
}

public function show($id)
{
    $event = Event::findOrFail($id);
    return view('admin.events.show', compact('event'));
}

public function edit($id)
{
    $event = Event::findOrFail($id);
    return view('admin.events.edit', compact('event'));
}

public function update(Request $request, $id)
{
    $event = Event::findOrFail($id);
    $event->update($request->all());
    return redirect()->route('admin.index')->with('success', 'Event updated successfully!');
}

public function destroy($id)
{
    Event::findOrFail($id)->delete();
    return redirect()->route('admin.index')->with('success', 'Event deleted successfully!');
}

}
