<div class="flex items-center justify-between p-4 border-b hover:bg-gray-50">
    <div class="flex items-center space-x-4">
        <div class="w-10 h-10 rounded-full bg-gray-200 overflow-hidden">
            @if($user->profile_photo_path)
            <img src="{{ asset('storage/'.$user->profile_photo_path) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
            @else
            <div class="w-full h-full flex items-center justify-center text-sm font-bold text-gray-600">
                {{ Str::initials($user->name) }}
            </div>
            @endif
        </div>
        <div>
            <h4 class="font-medium">{{ $user->name }}</h4>
            <p class="text-sm text-gray-500">{{ $user->email }}</p>
        </div>
    </div>
    <div class="text-right">
        <span class="px-2 py-1 text-xs rounded-full 
                  {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 
                     ($user->role === 'organizer' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
            {{ Str::ucfirst($user->role) }}
        </span>
    </div>
</div>