<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts
        </h2>
    </x-slot>

    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-60">
        <form method="POST" action="{{ route('admin.comment.update', $comment->id) }}" class="py-16">
            @method('PUT')
            @csrf

            <input type="hidden" name="post_id" value="{{$comment->post_id}}">
            <div class="mt-4">
                <x-label for="text" :value="__('Comment')" />

                <textarea name="text" rows="10" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{old('text') ?? $comment->text}}</textarea>
            </div>

            <div class="flex items-center justify-end mt-4  text-center">
                <x-button class="w-full md:inline-block">
                    Update Comment
                </x-button>
            </div>
        </form>
    </div>

</x-app-layout>
