@props(['posts'])

@foreach($posts as $post)
    <div class="px-10 py-20 text-center border rounded lg:px-5 lg:py-10 xl:py-20">
        <p class="mb-2 text-xs font-semibold tracking-wide text-gray-600 uppercase">
            {{$post->datePosted}}
        </p>
        <div class="">
            <x-badge class="bg-black text-white mx-2">
                {{$post->author->name}}
            </x-badge>
        </div>
        <p class="inline-block max-w-xs mx-auto mb-3 text-2xl font-extrabold leading-7 transition-colors duration-200 hover:text-deep-purple-accent-400" aria-label="Read article" title="{{$post->shortText}}">
            {{$post->title}}
        </p>
        <p class="max-w-xs mx-auto mb-2 text-gray-700">
            {{$post->shortText}}
        </p>
        <a href="{{route('show.post',$post->id)}}" aria-label="" class="inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">Read more</a>
    </div>
@endforeach
