<div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-lg max-w-md w-full">
        <div class="p-6">
            <div class="flex justify-between items-start">
                <h3 class="text-xl font-bold">Votre billet</h3>
                <button @click="show = false" class="text-gray-400 hover:text-gray-500">
                    <x-icon name="x" class="w-6 h-6" />
                </button>
            </div>
            
            <div class="mt-6 text-center">
                <img src="{{ asset($reservation->qr_code_path) }}" alt="QR Code" class="mx-auto w-48 h-48">
                <p class="mt-4 font-mono text-sm">{{ $reservation->ticket_number }}</p>
            </div>
            
            <div class="mt-6 space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-600">Événement</span>
                    <span>{{ $reservation->event->title }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Date</span>
                    <span>{{ $reservation->event->date->format('d M Y, H:i') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Prix payé</span>
                    <span class="font-bold">{{ $reservation->formatted_price }}</span>
                </div>
            </div>
            
            <div class="mt-6 flex justify-end space-x-3">
                <button @click="show = false" class="btn-outline">Fermer</button>
                <a href="{{ route('reservations.download', $reservation) }}" class="btn-primary">
                    Télécharger
                </a>
            </div>
        </div>
    </div>
</div>