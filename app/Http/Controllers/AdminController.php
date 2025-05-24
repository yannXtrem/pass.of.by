<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard()
    {
        $stats = [
            'users' => User::count(),
            'events' => Event::count(),
            'reservations' => Reservation::count(),
            'revenue' => Reservation::sum('price_paid'),
        ];

        $recentEvents = Event::latest()->take(5)->get();
        $recentReservations = Reservation::with(['user', 'event'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentEvents', 'recentReservations'));
    }

    public function scanTicket()
    {
        return view('admin.scan');
    }

    public function verifyTicket(Request $request)
    {
        $reservation = Reservation::where('ticket_number', $request->ticket_number)
            ->firstOrFail();

        if ($reservation->status !== 'confirmed') {
            return response()->json(['valid' => false, 'message' => 'Ticket non valide']);
        }

        return response()->json([
            'valid' => true,
            'event' => $reservation->event->title,
            'user' => $reservation->user->name,
        ]);
    }
}