<div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
    <div class="p-4">
        <div class="flex justify-between items-start">
            <h3 class="font-bold">{{ $reservation->event->title }}</h3>
            <span class="px-2 py-1 text-xs rounded-full 
                      {{ $reservation->status === 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ Str::ucfirst($reservation->status) }}
            </span>
        </div>
        <p class="mt-2 text-sm text-gray-600">{{ $reservation->event->date->format('d M Y') }}</p>
        <div class="mt-4 flex justify-center">
            <img src="{{ asset($reservation->qr_code_path) }}" alt="QR Code" class="w-24 h-24">
        </div>
        <div class="mt-4 text-center">
            <button @click="showReservationModal = true" class="text-blue-600 text-sm">Voir détails</button>
        </div>
    </div>
</div>