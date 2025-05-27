<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Rsvp;

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
            'name' => 'required|string|max:255',
            'date' => 'required|date|after:today',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'rsvp_limit' => 'nullable|integer|min:3', 
        ], [
            'name.required' => 'The event name is required.',
            'date.required' => 'The event date is required.',
            'date.after' => 'The event date must be in the future.',
            'location.required' => 'The event location is required.',
            'rsvp_limit.min' => 'RSVP limit must be at least 3.',
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
        return view('show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date|after:today',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'rsvp_limit' => 'nullable|integer|min:3', 
        ], [
            'name.required' => 'The event name is required.',
            'date.required' => 'The event date is required.',
            'date.after' => 'The event date must be in the future.',
            'location.required' => 'The event location is required.',
            'rsvp_limit.min' => 'RSVP limit must be at least 3.',
        ]);

        $event->update($validated);
        
        return redirect()->route('admin.index')->with('success', 'Event updated successfully!');
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return redirect()->route('admin.index')->with('success', 'Event deleted successfully!');
    }

//  for FITLER 

    public function allEvents(Request $request)
    {
        $query = Event::withCount('rsvps')->latest();
        
        if ($request->has('location') && $request->location != '') {
            $query->where('location', 'like', '%'.$request->location.'%');
        }
        
        $events = $query->get();
        
        return view('dashboard', compact('events'));
    }

    public function filteredEvents(Request $request)
    {
        $validated = $request->validate([
            'location' => 'nullable|string|max:255'
        ]);
        
        $query = Event::query();
        
        if (!empty($validated['location'])) {
            $query->where('location', 'like', '%'.$validated['location'].'%');
        }
        
        $events = $query->latest()->get();
        
        return view('dashboard', compact('events'));
    }












public function rsvp(Request $request, $eventId)
{
    $event = Event::findOrFail($eventId);
    $user = auth()->user();

    // Check if user already RSVP'd
    if (Rsvp::where('user_id', $user->id)->where('event_id', $eventId)->exists()) {
        return back()->with('info', 'You have already RSVP\'d to this event.');
    }

    // Check RSVP limit
    if ($event->isFull()) {
        return back()->with('error', 'This event has reached its RSVP limit.');
    }

    // Create RSVP
    Rsvp::create([
        'user_id' => $user->id,
        'event_id' => $event->id
    ]);

    return back()->with('success', 'Your RSVP was successful!');
}


}
