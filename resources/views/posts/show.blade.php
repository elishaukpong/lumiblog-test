<x-app-layout :metas="$entity->metas">

    <x-slot name="meta">
        @foreach($entity->metas as $meta)
            <meta name="{{$meta->name}}" content="{{$meta->content}}">
        @endforeach
    </x-slot>

    <div class="max-w-xl md:mx-auto sm:text-center lg:max-w-2xl">
        <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
      <span class="relative inline-block">
        <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
          <defs>
            <pattern id="db164e35-2a0e-4c0f-ab05-f14edc6d4d30" x="0" y="0" width=".135" height=".30">
              <circle cx="1" cy="1" r=".7"></circle>
            </pattern>
          </defs>
          <rect fill="url(#db164e35-2a0e-4c0f-ab05-f14edc6d4d30)" width="52" height="24"></rect>
        </svg>
      </span>
            {{$entity->title}}
        </h2>

        <div class="mb-4 sm:text-center ">
            <div>
                <p  data-text="{{$entity->author->name}}, {{$entity->author->dateJoined}}" class="tooltip-text font-semibold text-gray-800 transition-colors duration-200 hover:text-deep-purple-accent-700">
                    {{$entity->author->name}}</p>
                <p class="text-sm font-medium leading-4 text-gray-600">Author</p>
            </div>
        </div>
        <p class="mb-2 text-xs font-semibold tracking-wide text-gray-600 uppercase sm:text-center">
            {{$entity->datePosted}}
        </p>

    </div>

    <x-post-show :post="$entity"/>

</x-app-layout>
