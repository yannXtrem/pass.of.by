<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class ReservationController extends Controller
{
    public function create(Event $event)
    {
        if ($event->capacity <= $event->reservations()->count()) {
            return back()->with('error', 'Complet! Plus de places disponibles.');
        }

        return view('reservations.create', compact('event'));
    }

    public function store(StoreReservationRequest $request, Event $event)
    {
        if ($event->capacity <= $event->reservations()->count()) {
            return back()->with('error', 'Complet! Plus de places disponibles.');
        }

        $ticketNumber = 'TKT-' . now()->format('Ymd') . '-' . strtoupper(uniqid());

        $qrCodePath = 'qrcodes/' . $ticketNumber . '.svg';
        Storage::disk('public')->put(
            $qrCodePath,
            QrCode::size(200)->generate($ticketNumber)
        );

        $reservation = auth()->user()->reservations()->create([
            'event_id' => $event->id,
            'ticket_number' => $ticketNumber,
            'qr_code_path' => $qrCodePath,
            'price_paid' => $event->price,
            'status' => 'confirmed',
        ]);

        return redirect()->route('reservations.show', $reservation)
            ->with('success', 'Réservation confirmée!');
    }

    public function show(Reservation $reservation)
    {
        $this->authorize('view', $reservation);
        return view('reservations.show', compact('reservation'));
    }

    public function cancel(Reservation $reservation)
    {
        $this->authorize('update', $reservation);
        
        $reservation->update(['status' => 'cancelled']);

        return back()->with('success', 'Réservation annulée!');
    }
}