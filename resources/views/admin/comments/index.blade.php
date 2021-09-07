<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Comments
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
            @foreach($comments as $comment)
                <div class="p-8 rounded shadow-xl sm:p-16 my-12">
                <div class="flex flex-col lg:flex-row">
                    <div class="mb-6 lg:mb-0 lg:w-1/2 lg:pr-5">
                        <h2 class="font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
                            <span class="inline-block text-deep-purple-accent-400">Post Title:</span> <br class="hidden md:block" />
                            {{$comment->shortPostTitle}}
                        </h2>
                    </div>
                    <div class="lg:w-1/2">
                        <p class="mb-4 text-base text-gray-700">
                           {{$comment->text}}
                        </p>
                        <div>
                            <x-badge :href="route('admin.comment.edit',$comment->id)"  class="bg-teal-accent-400 text-teal-900 text-center">
                                Update
                            </x-badge>
                            <x-badge :href="route('admin.tag.create')" class="text-center bg-red-900 text-white">
                                Delete
                            </x-badge>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
