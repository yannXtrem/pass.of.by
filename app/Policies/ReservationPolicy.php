<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reservation;

class ReservationPolicy
{
    public function view(User $user, Reservation $reservation)
    {
        return $user->id === $reservation->user_id || 
               $user->isAdmin();
    }

    public function cancel(User $user, Reservation $reservation)
    {
        return $user->id === $reservation->user_id && 
               $reservation->status === 'confirmed' &&
               $reservation->event->date->isFuture();
    }

    public function pay(User $user, Reservation $reservation)
    {
        return $user->id === $reservation->user_id && 
               $reservation->status === 'pending';
    }
}