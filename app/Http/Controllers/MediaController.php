<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,mp4',
            'type' => 'required|in:image,video',
        ]);

        $path = $request->file('file')->store('events/media', 'public');

        $event->media()->create([
            'file_path' => $path,
            'type' => $request->type,
        ]);

        return back()->with('success', 'Média ajouté!');
    }

    public function destroy(Media $media)
    {
        $this->authorize('delete', $media);
        
        Storage::disk('public')->delete($media->file_path);
        $media->delete();

        return back()->with('success', 'Média supprimé!');
    }
}