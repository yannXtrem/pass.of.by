<div class="bg-white rounded-lg shadow p-6">
    <div class="flex items-center space-x-3">
        <div class="w-10 h-10 rounded-full bg-gray-200 overflow-hidden">
            @if($comment->user->profile_photo_path)
            <img src="{{ asset('storage/'.$comment->user->profile_photo_path) }}" alt="{{ $comment->user->name }}" class="w-full h-full object-cover">
            @else
            <div class="w-full h-full flex items-center justify-center text-sm font-bold text-gray-600">
                {{ Str::initials($comment->user->name) }}
            </div>
            @endif
        </div>
        <div>
            <h4 class="font-bold">{{ $comment->user->name }}</h4>
            <div class="flex items-center">
                @for($i = 0; $i < 5; $i++)
                <x-icon name="star" class="w-4 h-4 {{ $i < $comment->rating ? 'text-yellow-400 fill-current' : 'text-gray-300' }}" />
                @endfor
            </div>
        </div>
    </div>
    <p class="mt-4 text-gray-700 line-clamp-3">{{ $comment->content }}</p>
    <div class="mt-4 flex justify-between items-center">
        <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
        <button @click="showCommentModal = true" class="text-blue-600 text-sm">Lire plus</button>
    </div>
</div>