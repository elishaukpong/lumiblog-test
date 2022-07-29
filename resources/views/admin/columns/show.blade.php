<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Column

            <x-badge :href="route('admin.post.edit',$entity->id)" class="bg-teal-accent-400 text-teal-900">
                Edit
            </x-badge>

            <x-badge :href="route('admin.post.destroy',$entity->id)" class="bg-red-500 text-white delete">
                Delete
            </x-badge>

        </h2>
    </x-slot>

    <div class="px-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:pt-20">
        <div class="max-w-xl mb-5 md:mx-auto sm:text-center lg:max-w-2xl">
            <div class="mb-4">
                <a class="inline-block max-w-lg font-sans text-3xl font-extrabold leading-none tracking-tight text-black transition-colors duration-200 hover:text-deep-purple-accent-700 sm:text-4xl">
                    {{$entity->name}}
                </a>
            </div>
        </div>
    </div>

    <div class="px-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-60">
        <form method="POST" action="{{ route('admin.variant.store') }}" class="py-16">
        @csrf
            <!-- Password -->
            <div class="mt-4">
                <x-label for="description" :value="__('Variant')" />

                <x-text-area id="description"
                             class="block mt-1 w-full"
                             rows="10"
                             name="value" />

                <input type="hidden" value="{{$entity->id}}" name="column_id">
            </div>

            <div class="flex items-center justify-end mt-4  text-center">
                <x-button class="w-full md:inline-block">
                    Create Variant
                </x-button>
            </div>
        </form>
    </div>

    <div class="px-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:pt-20">
        <div class="max-w-xl mb-5 md:mx-auto sm:text-center lg:max-w-2xl">
            <div class="mb-4">
                <a class="inline-block max-w-lg font-sans text-3xl font-extrabold leading-none tracking-tight text-black transition-colors duration-200 hover:text-deep-purple-accent-700 sm:text-4xl">
                    Variants List
                </a>
            </div>
        </div>
    </div>

    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="grid max-w-sm gap-5 mb-8 lg:grid-cols-3 sm:mx-auto lg:max-w-full">
            @foreach($entity->variants as $variant)
                <div class="px-10 py-20 text-center border rounded lg:px-5 lg:py-10 xl:py-20">
                    <p class="inline-block max-w-xs mx-auto mb-3 text-2xl font-extrabold leading-7 transition-colors duration-200 hover:text-deep-purple-accent-400" >
                        {{$variant->value}}
                    </p>
                </div>
            @endforeach
        </div>
    </div>

</x-dashboard-layout>
