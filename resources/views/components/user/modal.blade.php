<div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-lg max-w-md w-full">
        <div class="p-6">
            <div class="flex justify-between items-start">
                <h3 class="text-xl font-bold">Profil utilisateur</h3>
                <button @click="show = false" class="text-gray-400 hover:text-gray-500">
                    <x-icon name="x" class="w-6 h-6" />
                </button>
            </div>
            
            <div class="mt-6 flex flex-col items-center">
                <div class="w-24 h-24 rounded-full bg-gray-200 overflow-hidden mb-4">
                    @if($user->profile_photo_path)
                    <img src="{{ asset('storage/'.$user->profile_photo_path) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                    @else
                    <div class="w-full h-full flex items-center justify-center text-3xl font-bold text-gray-600">
                        {{ Str::initials($user->name) }}
                    </div>
                    @endif
                </div>
                
                <h4 class="text-lg font-bold">{{ $user->name }}</h4>
                <span class="px-3 py-1 mt-2 text-xs rounded-full 
                          {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 
                             ($user->role === 'organizer' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                    {{ Str::ucfirst($user->role) }}
                </span>
            </div>
            
            <div class="mt-6 space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-600">Email</span>
                    <span>{{ $user->email }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Téléphone</span>
                    <span>{{ $user->telephone ?? 'Non renseigné' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Inscrit depuis</span>
                    <span>{{ $user->created_at->format('d/m/Y') }}</span>
                </div>
            </div>
            
            <div class="mt-6 flex justify-end">
                <button @click="show = false" class="btn-primary">Fermer</button>
            </div>
        </div>
    </div>
</div>