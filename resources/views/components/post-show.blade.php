@props(['post'])

<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:pt-10 lg:pb-10">

    <div class="lg:w-1/2 py-10  mx-auto mb-5">
        <p class="text-base text-gray-700 text-center ">
            {!! $post->text !!}
        </p>
    </div>
    <div class="max-w-xl mb-5 md:mx-auto sm:text-center lg:max-w-2xl">
        <div class="mx-16">
            @foreach($post->tags as $tag)
                <x-badge class="bg-black text-white mx-2">
                    {{$tag->name}}
                </x-badge>
            @endforeach
        </div>
    </div>

    <hr class="">

</div>

<div class="px-4 mb-10 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-60">
    @auth
        <form method="POST" action="{{route('post.comment')}}" class="mb-10">
            @csrf

            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="mt-4">
                <x-label for="text" :value="__('Comment')" />

                <textarea name="text" rows="5" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
            </div>

            <div class="flex items-center justify-end mt-4  text-center">
                <x-button class="w-full md:inline-block">
                    Add Comment
                </x-button>
            </div>
        </form>
    @else
        <div class="text-center my-6">
            <a href="{{route('login')}}"
               class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md md:w-auto bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
            >
                Login to Comment
            </a>
        </div>
    @endauth

    <div class="max-w-screen-lg sm:mx-auto">
        @foreach($post->comments as $comment)
            <div class="flex flex-col items-start py-4 rounded sm:px-4 lg:flex-row sm:hover:translate-x-4 sm:hover:bg-blue-gray-50">
                <div class="mb-4 lg:mb-0">
                    <h5 class="mb-4 font-bold">
                        {{$comment->author->name}} <span class="text-gray-600">- {{$comment->created_at->diffForHumans()}}</span>
                    </h5>

                    <div class="relative pr-8">
                        <p class="text-base text-gray-700 md:text-lg">
                            {{$comment->text}}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


</div>
