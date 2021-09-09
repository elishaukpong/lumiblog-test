<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts

            <x-badge :href="route('admin.post.create')" class="bg-teal-accent-400 text-teal-900">
                Create
            </x-badge>
        </h2>
    </x-slot>

    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="grid max-w-sm gap-5 mb-8 lg:grid-cols-3 sm:mx-auto lg:max-w-full">
            @foreach($entities as $post)
                <div class="px-10 py-20 text-center border rounded lg:px-5 lg:py-10 xl:py-20">
                    <p class="mb-2 text-xs font-semibold tracking-wide text-gray-600 uppercase">
                        {{$post->datePosted}}
                    </p>
                    <p class="inline-block max-w-xs mx-auto mb-3 text-2xl font-extrabold leading-7 transition-colors duration-200 hover:text-deep-purple-accent-400" aria-label="Read article" title="{{$post->shortText}}">
                        {{$post->title}}
                    </p>
                    <p class="max-w-xs mx-auto mb-2 text-gray-700">
                        {{$post->shortText}}
                    </p>
                    <a href="{{route('admin.post.show',$post->id)}}" aria-label="" class="inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">Read more</a>
                </div>
            @endforeach
        </div>
    </div>

</x-dashboard-layout>
