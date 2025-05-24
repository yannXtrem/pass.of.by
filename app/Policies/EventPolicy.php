<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Event;

class EventPolicy
{
    public function create(User $user)
    {
        return $user->isOrganizer(); // Supposant que vous avez cette méthode dans le modèle User
    }

    public function update(User $user, Event $event)
    {
        return $user->id === $event->organizer_id;
    }

    public function delete(User $user, Event $event)
    {
        return $user->id === $event->organizer_id && 
               $event->reservations()->count() === 0;
    }

    public function publish(User $user, Event $event)
    {
        return $user->id === $event->organizer_id && 
               !$event->is_published;
    }
}