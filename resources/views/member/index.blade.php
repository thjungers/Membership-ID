<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Liste des membres
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div 
                class="p-6 text-gray-900 dark:text-gray-100"
                x-data="{
                    search: '',
                    num_display: 10,
                    items: [
                        @foreach ($members as $member)
                        {text: '{{ $member->first_name }} {{ $member->last_name }}', id: {{ $member->id }}},
                        @endforeach
                    ],
                    get filteredItems() {
                        return this.items.filter(
                            item => item.text.toLowerCase().includes(this.search.toLowerCase())
                        ).slice(0, this.num_display)
                    }
                }"
                >
                    <x-text-input class="block w-full" x-model="search" autofocus />
                    <template x-for="item in filteredItems">
                        <a 
                        class="block w-full px-4 py-2 bg-white dark:bg-gray-800 border-b border-gray-300 dark:border-gray-500 text-s text-gray-700 dark:text-gray-300 tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150" 
                        x-text="item.text" 
                        x-bind:href="'/members/' + item.id"
                        ></a>
                    </template>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>