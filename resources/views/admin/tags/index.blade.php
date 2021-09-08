<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tags
            <x-badge :href="route('admin.tag.create')" class="bg-teal-accent-400 text-teal-900">
                Create
            </x-badge>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
            <div class="grid gap-4 row-gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($tags as $tag)
                    <div class="flex flex-col justify-between p-5 border rounded shadow-sm">
                    <div>
                        <div class="flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-indigo-50">
                            <svg class="w-12 h-12 text-deep-purple-accent-400" stroke="currentColor" viewBox="0 0 52 52">
                                <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                            </svg>
                        </div>
                        <h6 class="mb-2 font-semibold leading-5">{{$tag->name}}</h6>
                        <p class="mb-3 text-sm text-gray-900">
                            {{Str::limit($tag->description,50)}}
                        </p>
                    </div>
                    <div>
                        <x-badge :href="route('admin.tag.edit', $tag->id)"  class="bg-teal-accent-400 text-teal-900 text-center">
                            Update
                        </x-badge>
                        <x-badge :href="route('admin.tag.create')" class="text-center bg-red-500 text-white">
                            Delete
                        </x-badge>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{$tags->links()}}
            </div>
        </div>
    </div>
</x-dashboard-layout>
