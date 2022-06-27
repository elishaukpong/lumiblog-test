<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Path
        </h2>
    </x-slot>

    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-60">
        <form method="POST" action="{{ route('admin.path.store') }}" class="py-16">
        @csrf

        <!-- Email Address -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="path" :value="old('path')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4  text-center">
                <x-button class="w-full md:inline-block">
                    Create Path
                </x-button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
