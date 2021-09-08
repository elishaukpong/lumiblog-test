<x-dashboard>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts

            <x-badge :href="route('admin.post.edit',$post->id)" class="bg-teal-accent-400 text-teal-900">
                Edit
            </x-badge>

            <x-badge :href="route('admin.post.create')" class="bg-red-500 text-white">
                Delete
            </x-badge>
        </h2>
    </x-slot>

    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <p class="mb-2 text-xs font-semibold tracking-wide text-gray-600 uppercase sm:text-center">
            {{$post->datePosted}}
        </p>
        <div class="max-w-xl mb-5 md:mx-auto sm:text-center lg:max-w-2xl">
            <div class="mb-4">
                <a  aria-label="Article" class="inline-block max-w-lg font-sans text-3xl font-extrabold leading-none tracking-tight text-black transition-colors duration-200 hover:text-deep-purple-accent-700 sm:text-4xl">
                    {{$post->title}}
                </a>
            </div>
        </div>
        <div class="mb-10 sm:text-center">
            <div>
                <p aria-label="Author" class="font-semibold text-gray-800 transition-colors duration-200 hover:text-deep-purple-accent-700">
                    {{$post->author->name}}</p>
                <p class="text-sm font-medium leading-4 text-gray-600">Author</p>
            </div>
        </div>

        <div class="lg:w-1/2 py-10  mx-auto">
            <p class="text-base text-gray-700 text-center ">
                {!! $post->text !!}
            </p>
        </div>

        <div class="max-w-xl mb-5 md:mx-auto sm:text-center lg:max-w-2xl">
            <hr class="mb-6">
            <div class="mx-16">
                @foreach($post->tags as $tag)
                    <x-badge class="bg-black text-white mx-2">
                        {{$tag->name}}
                    </x-badge>
                @endforeach
            </div>
        </div>
    </div>

</x-dashboard>
