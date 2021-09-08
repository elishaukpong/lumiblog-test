<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts
        </h2>
    </x-slot>

    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-60">
        <form method="POST" action="{{ route('admin.post.update', $entity->id) }}" class="py-16">
            @method('PUT')
            @csrf

            <div>
                <x-label for="title" :value="__('Name')" />

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title') ?? $entity->title" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="text" :value="__('Text')" />

                <textarea name="text" rows="10" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{old('text') ?? $entity->text}}</textarea>

            </div>

            <div class="mt-4">
                <x-label for="text" :value="__('Tags')" />
                <div class="mt-2 grid grid-cols-4">
                    @foreach($tags as $tag)
                        <div class="col-auto">
                            <label>
                                <input type="checkbox" value="{{$tag->id}}" name="tags_id[]" class="form-checkbox" @if($entity->hasTag($tag)) checked @endif>
                                <span class="ml-2">{{$tag->name}}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex items-center justify-end mt-4  text-center">
                <x-button class="w-full md:inline-block">
                    Update Post
                </x-button>
            </div>
        </form>
    </div>

</x-dashboard-layout>
