<div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
    <img class="h-48 w-full object-cover" src="{{ asset($event->image_path) }}" alt="{{ $event->title }}">
    <div class="p-6">
        <div class="flex justify-between items-start">
            <h3 class="text-xl font-bold">{{ $event->title }}</h3>
            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                {{ $event->date->format('d M') }}
            </span>
        </div>
        <p class="mt-2 text-gray-600 line-clamp-2">{{ $event->description }}</p>
        <div class="mt-4 flex justify-between items-center">
            <span class="font-bold">{{ $event->formatted_price }}</span>
            <a href="{{ route('events.show', $event) }}" class="btn-primary py-2 px-4">
                Détails
            </a>
        </div>
    </div>
</div>