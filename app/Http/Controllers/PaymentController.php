<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function process(Request $request, Reservation $reservation)
    {
        $this->authorize('pay', $reservation);

        // Intégration avec Stripe
        try {
            $charge = auth()->user()->charge(
                $reservation->price_paid * 100,
                $request->payment_method_id
            );

            $reservation->payment()->create([
                'transaction_id' => $charge->id,
                'amount' => $reservation->price_paid,
                'status' => 'completed',
            ]);

            return redirect()->route('reservations.show', $reservation)
                ->with('success', 'Paiement réussi!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}