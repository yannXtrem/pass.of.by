<div class="py-4 border-b">
    <div class="flex justify-between items-start">
        <div>
            <div class="flex items-center space-x-2">
                <h4 class="font-medium">{{ $comment->user->name }}</h4>
                <div class="flex items-center">
                    @for($i = 0; $i < 5; $i++)
                    <x-icon name="star" class="w-3 h-3 {{ $i < $comment->rating ? 'text-yellow-400 fill-current' : 'text-gray-300' }}" />
                    @endfor
                </div>
            </div>
            <p class="mt-1 text-gray-600">{{ Str::limit($comment->content, 120) }}</p>
        </div>
        <span class="text-sm text-gray-400">{{ $comment->created_at->format('d/m/Y') }}</span>
    </div>
</div>