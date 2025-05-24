<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Event $event)
    {
        $comment = $event->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Commentaire ajouté!');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();

        return back()->with('success', 'Commentaire supprimé!');
    }
}