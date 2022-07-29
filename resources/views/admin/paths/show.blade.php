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

            <x-badge :href="route('admin.column.create')" class="bg-teal-accent-400 text-teal-900">
                Create Column
            </x-badge>

            <x-badge :href="route('admin.composition.create')" class="bg-teal-accent-400 text-teal-900">
                Create Composition
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

    <div class="py-12">
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
            <div class="grid gap-4 row-gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($entity->columns as $column)
                    <div class="flex flex-col justify-between p-5 border rounded shadow-sm">
                        <div>
                            <div class="flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-indigo-50">
                                <svg class="w-12 h-12 text-deep-purple-accent-400" stroke="currentColor" viewBox="0 0 52 52">
                                    <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                                </svg>
                            </div>
                            <h6 class="mb-2 font-semibold leading-5">{{$column->name}}</h6>
                        </div>
                        <div>
                            <x-badge :href="route('admin.column.show', $column->id)"  class="bg-teal-accent-400 text-teal-900 text-center">
                                See Variants
                            </x-badge>

                            <x-badge :href="route('admin.column.destroy', $column->id)" class="text-center bg-red-500 text-white delete">
                                Delete
                            </x-badge>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

</x-dashboard-layout>
