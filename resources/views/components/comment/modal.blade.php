<div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-lg max-w-2xl w-full">
        <div class="p-6">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-xl font-bold">Avis sur {{ $comment->event->title }}</h3>
                    <div class="flex items-center mt-1 space-x-2">
                        <div class="flex items-center">
                            @for($i = 0; $i < 5; $i++)
                            <x-icon name="star" class="w-5 h-5 {{ $i < $comment->rating ? 'text-yellow-400 fill-current' : 'text-gray-300' }}" />
                            @endfor
                        </div>
                        <span class="text-sm text-gray-500">par {{ $comment->user->name }}</span>
                    </div>
                </div>
                <button @click="show = false" class="text-gray-400 hover:text-gray-500">
                    <x-icon name="x" class="w-6 h-6" />
                </button>
            </div>
            
            <div class="mt-6">
                <p class="text-gray-700 whitespace-pre-line">{{ $comment->content }}</p>
            </div>
            
            <div class="mt-6 flex justify-between items-center">
                <span class="text-sm text-gray-500">Posté {{ $comment->created_at->diffForHumans() }}</span>
                
                @can('delete', $comment)
                <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm">
                        Supprimer cet avis
                    </button>
                </form>
                @endcan
            </div>
        </div>
    </div>
</div>