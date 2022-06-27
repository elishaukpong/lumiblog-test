<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Path

            <x-badge :href="route('admin.post.edit',$entity->id)" class="bg-teal-accent-400 text-teal-900">
                Edit
            </x-badge>

            <x-badge :href="route('admin.post.destroy',$entity->id)" class="bg-red-500 text-white delete">
                Delete
            </x-badge>

            <x-badge :href="route('admin.post.destroy',$entity->id)" class="bg-teal-accent-400 text-teal-900">
                Create column
            </x-badge>


        </h2>
    </x-slot>

    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="max-w-xl mb-5 md:mx-auto sm:text-center lg:max-w-2xl">
            <div class="mb-4">
                <a  aria-label="Article" class="inline-block max-w-lg font-sans text-3xl font-extrabold leading-none tracking-tight text-black transition-colors duration-200 hover:text-deep-purple-accent-700 sm:text-4xl">
                    {{$entity->path}}
                </a>
            </div>
        </div>

    </div>

</x-dashboard-layout>
