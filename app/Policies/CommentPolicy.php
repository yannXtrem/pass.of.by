<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;
use App\Models\Event;

class CommentPolicy
{
    public function create(User $user)
    {
        return $user->hasVerifiedEmail();
    }

    public function delete(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id || 
               $user->isAdmin();
    }

    public function comment(User $user, Event $event)
    {
        return $user->reservations()
            ->where('event_id', $event->id)
            ->where('status', 'confirmed')
            ->exists();
    }
}