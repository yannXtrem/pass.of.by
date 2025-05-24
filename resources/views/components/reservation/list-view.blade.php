<div class="flex items-center justify-between p-4 border-b">
    <div class="flex items-center space-x-4">
        <img src="{{ asset($reservation->qr_code_path) }}" alt="QR Code" class="w-12 h-12">
        <div>
            <h4 class="font-medium">{{ $reservation->event->title }}</h4>
            <p class="text-sm text-gray-500">{{ $reservation->ticket_number }}</p>
        </div>
    </div>
    <div class="text-right">
        <p class="font-medium">{{ $reservation->formatted_price }}</p>
        <p class="text-sm {{ $reservation->status === 'confirmed' ? 'text-green-600' : 'text-red-600' }}">
            {{ Str::ucfirst($reservation->status) }}
        </p>
    </div>
</div>