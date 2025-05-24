<div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-lg max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="relative">
            <img src="{{ asset($event->image_path) }}" alt="{{ $event->title }}" class="w-full h-64 object-cover">
            <button @click="show = false" class="absolute top-4 right-4 bg-white rounded-full p-2 shadow">
                <x-icon name="x" class="w-5 h-5" />
            </button>
        </div>
        
        <div class="p-6">
            <h2 class="text-2xl font-bold">{{ $event->title }}</h2>
            <div class="flex items-center mt-2 space-x-4 text-sm">
                <span class="flex items-center">
                    <x-icon name="calendar" class="w-4 h-4 mr-1" />
                    {{ $event->date->format('d M Y, H:i') }}
                </span>
                <span class="flex items-center">
                    <x-icon name="map-pin" class="w-4 h-4 mr-1" />
                    {{ $event->location }}
                </span>
            </div>
            
            <p class="mt-4 text-gray-700">{{ $event->description }}</p>
            
            <div class="mt-6 grid grid-cols-2 gap-4">
                <div>
                    <h4 class="font-semibold">Places disponibles</h4>
                    <p>{{ $event->remaining_capacity }} / {{ $event->capacity }}</p>
                </div>
                <div class="text-right">
                    <span class="text-2xl font-bold">{{ $event->formatted_price }}</span>
                </div>
            </div>
            
            <div class="mt-6 flex justify-end space-x-3">
                <button @click="show = false" class="btn-outline">Fermer</button>
                <a href="{{ route('reservations.create', $event) }}" class="btn-primary">Réserver</a>
            </div>
        </div>
    </div>
</div>