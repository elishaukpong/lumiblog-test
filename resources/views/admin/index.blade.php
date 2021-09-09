<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">

        <div class="grid grid-cols-2 row-gap-8 md:grid-cols-4">
            <div class="text-center md:border-r">
                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl">{{\App\Models\Post::count()}}</h6>
                <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                    Posts
                </p>
            </div>
            <div class="text-center md:border-r">
                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl">{{\App\Models\Comment::count()}}</h6>
                <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                    Comments
                </p>
            </div>
            <div class="text-center md:border-r">
                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl">{{\App\Models\Tag::count()}}</h6>
                <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                    Tags
                </p>
            </div>
            <div class="text-center">
                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl">{{\App\Models\User::count()}}</h6>
                <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                    Users
                </p>
            </div>
        </div>
        <hr class="my-5">
    </div>

</x-dashboard-layout>
