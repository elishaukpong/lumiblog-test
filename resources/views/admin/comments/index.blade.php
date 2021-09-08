<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Comments
        </h2>
    </x-slot>

    <div class="relative px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="relative grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($entities as $key => $comment)
                <div class="flex flex-col justify-between overflow-hidden text-left transition-shadow duration-200 bg-white rounded shadow-xl group hover:shadow-2xl">
                <div class="p-5">
                    <p class=" font-bold">{{$comment->post->title}}</p>
                    <p class="mb-2 text-sm leading-5 text-gray-900">
                        {{$comment->author->name}}
                    </p>
                    <p class="text-sm leading-5 text-gray-900">
                        {{$comment->shortText}}
                    </p>

                    <div class="mt-5">
                        <x-badge :href="route('admin.comment.edit',$comment->id)"  class="bg-teal-accent-400 text-teal-900 text-center">
                            Update
                        </x-badge>

                        <x-badge :href="route('admin.comment.destroy', $comment->id)"  class="text-center bg-red-500 text-white delete">
                            Delete
                        </x-badge>

                    </div>
                </div>
                <div class="w-full h-1 ml-auto duration-300 origin-left transform scale-x-0 bg-deep-purple-accent-400 group-hover:scale-x-100"></div>
            </div>
            @endforeach
        </div>

        <div class="py-10">
            {{$entities->links()}}
        </div>

    </div>
</x-dashboard-layout>
