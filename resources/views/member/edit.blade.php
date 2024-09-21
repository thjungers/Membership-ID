<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if ($member)
                {{ $member->first_name }} <span style="font-variant: small-caps">{{ $member->last_name }}</span>
            @else
                Nouveau membre
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form
                        action="/members/{{ $member?->id }}"
                        method="POST"
                        class="space-y-6"
                    >
                        @csrf
                        @if ($member)
                            @method("PATCH")                    
                        @endif
                        
                        <div>
                            <x-input-label for="update_first_name" value="Prénom" />
                            <x-text-input id="update_first_name" name="first_name" required class="mt-1 block w-full" :value="old('first_name', $member?->first_name)" />
                            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                        </div>
                        <div>
                            <x-input-label for="update_last_name" value="Nom de famille" />
                            <x-text-input id="update_last_name" name="last_name" required class="mt-1 block w-full" style="font-variant: small-caps" :value="old('last_name', $member?->last_name)" />
                            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                        </div>
                        <div>
                            <x-input-label for="update_email" value="Adresse e-mail" />
                            <x-text-input id="update_email" name="email" type="email" required class="mt-1 block w-full" :value="old('email', $member?->email)" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        <div>
                            <x-primary-button>{{ $member ? 'Modifier' : 'Créer' }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>