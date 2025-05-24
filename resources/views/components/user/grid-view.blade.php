<div class="bg-white rounded-lg shadow overflow-hidden text-center p-6">
    <div class="w-20 h-20 mx-auto rounded-full bg-gray-200 overflow-hidden mb-4">
        @if($user->profile_photo_path)
        <img src="{{ asset('storage/'.$user->profile_photo_path) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
        @else
        <div class="w-full h-full flex items-center justify-center text-2xl font-bold text-gray-600">
            {{ Str::initials($user->name) }}
        </div>
        @endif
    </div>
    <h4 class="font-bold">{{ $user->name }}</h4>
    <p class="text-sm text-gray-600">{{ $user->email }}</p>
    <span class="inline-block mt-2 px-3 py-1 text-xs rounded-full 
              {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 
                 ($user->role === 'organizer' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
        {{ Str::ucfirst($user->role) }}
    </span>
</div>