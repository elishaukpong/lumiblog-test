<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts

            <x-badge :href="route('admin.post.create')" class="bg-teal-accent-400 text-teal-900">
                Create
            </x-badge>
        </h2>
    </x-slot>

        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
            <div class="mb-10 border-t border-b divide-y">
                @foreach($posts as $post)
                <div class="grid py-8 sm:grid-cols-4">
                    <div class="mb-4 sm:mb-0">
                        <div class="space-y-1 text-xs font-semibold tracking-wide uppercase">
                            <a class="transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800" aria-label="Category">{{$post->primaryTag}}</a>
                            <p class="text-gray-600"> {{$post->datePosted}}</p>
                        </div>
                    </div>
                    <div class="sm:col-span-3 lg:col-span-2">
                        <div class="mb-3">
                            <a href="{{route('admin.post.show',$post->id)}}" aria-label="Article" class="inline-block text-black transition-colors duration-200 hover:text-deep-purple-accent-700">
                                <p class="text-3xl font-extrabold leading-none sm:text-4xl xl:text-4xl">
                                    {{$post->title}}
                                </p>
                            </a>
                        </div>
                        <p class="text-gray-700">
                           {{$post->shortText}}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
            {{$posts->links()}}
        </div>

</x-app-layout>
