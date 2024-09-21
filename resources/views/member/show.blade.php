<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $member->first_name }} <span style="font-variant: small-caps">{{ $member->last_name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form 
                        action="/members/{{ $member->id }}" 
                        method="POST" 
                        class="flex justify-center space-x-8" 
                        x-data="{}" 
                        x-on:submit="if(!confirm('Supprimer ce membre?')) $event.preventDefault()"
                    >
                        @csrf
                        <x-primary-button-link href="/m/{{ $member->qr_key }}" target="_blank" title="Afficher la carte du membre">
                            Afficher la carte <i class="fa-regular fa-eye ms-3"></i> 
                        </x-primary-button-link>
                        <x-secondary-button-link href="/members/{{ $member->id }}/edit" title="Modifier la fiche du membre">
                            Modifier la fiche <i class="fa-regular fa-pen-to-square ms-3"></i> 
                        </x-secondary-button-link>
                        
                        @method("DELETE")
                        <x-danger-button>
                            Supprimer le membre <i class="fa-regular fa-trash-can ms-3"></i>
                        </x-danger-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>