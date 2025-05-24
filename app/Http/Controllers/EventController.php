<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Gate;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('is_published', true)
            ->with('organizer')
            ->orderBy('date')
            ->paginate(10);

        return view('events.index', compact('events'));
    }

    public function create()
    {
        Gate::authorize('manage-events');
        return view('events.create');
    }

    public function store(StoreEventRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('events', 'public');
        }

        $event = auth()->user()->organizedEvents()->create($data);

        return redirect()->route('events.show', $event)
            ->with('success', 'Événement créé avec succès!');
    }

    public function show(Event $event)
    {
        $event->load(['organizer', 'comments.user', 'media']);
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        Gate::authorize('update', $event);
        return view('events.edit', compact('event'));
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $this->authorize('update', $event);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($event->image_path);
            $data['image_path'] = $request->file('image')->store('events', 'public');
        }

        $event->update($data);

        return redirect()->route('events.show', $event)
            ->with('success', 'Événement mis à jour!');
    }

    public function destroy(Event $event)
    {
        Gate::authorize('delete', $event);

        Storage::disk('public')->delete($event->image_path);
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Événement supprimé!');
    }

    public function publish(Event $event)
    {
        Gate::authorize('update', $event);
        $event->update(['is_published' => true]);

        return back()->with('success', 'Événement publié!');
    }
}