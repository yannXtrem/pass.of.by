<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Media;
use App\Models\Event;

class MediaPolicy
{
    public function create(User $user, Event $event)
    {
        return $user->id === $event->organizer_id;
    }

    public function delete(User $user, Media $media)
    {
        return $user->id === $media->event->organizer_id;
    }
}