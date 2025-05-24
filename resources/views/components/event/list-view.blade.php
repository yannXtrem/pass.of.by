<div class="flex bg-white rounded-lg shadow overflow-hidden">
    <img class="w-32 h-32 object-cover" src="{{ asset($event->image_path) }}" alt="{{ $event->title }}">
    <div class="flex-1 p-4">
        <div class="flex justify-between">
            <h3 class="text-lg font-bold">{{ $event->title }}</h3>
            <span class="text-sm text-gray-500">{{ $event->date->format('d M Y, H:i') }}</span>
        </div>
        <p class="mt-2 text-gray-600">{{ Str::limit($event->description, 100) }}</p>
        <div class="mt-3 flex justify-between items-center">
            <span class="font-bold">{{ $event->formatted_price }}</span>
            <div class="space-x-2">
                <a href="{{ route('events.show', $event) }}" class="btn-outline">Voir</a>
                @can('update', $event)
                <a href="{{ route('events.edit', $event) }}" class="btn-outline">Modifier</a>
                @endcan
            </div>
        </div>
    </div>
</div>