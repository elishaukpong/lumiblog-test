<x-dashboard>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tags
        </h2>
    </x-slot>

    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-60">
        <form method="POST" action="{{ route('admin.tag.update', $tag->id) }}" class="py-16">
        @csrf
        @method('PUT')

        <!-- Email Address -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $tag->name" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="description" :value="__('Description')" />

                <x-text-area id="description" class="block mt-1 w-full" rows="10" :value="$tag->description"
                         name="description" />
            </div>

            <div class="flex items-center justify-end mt-4  text-center">
                <x-button class="w-full md:inline-block">
                    Update Tag
                </x-button>
            </div>
        </form>
    </div>
</x-dashboard>
