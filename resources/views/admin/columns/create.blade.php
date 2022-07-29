<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Column
        </h2>
    </x-slot>

    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-60">
        <form method="POST" action="{{ route('admin.column.store') }}" class="py-16">
        @csrf
        <!-- Email Address -->
            <div>
                <x-label for="name" :value="__('Path')" />

                <select name="url_id" class="rounded-md shadow-sm border-gray-300 block mt-1 w-full" required>
                    <option value="">Select Url Path</option>
                    @foreach($urls as $url)
                        <option value="{{$url->id}}" class="">{{$url->path}}</option>
                    @endforeach
                </select>


                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4  text-center">
                <x-button class="w-full md:inline-block">
                    Create Column
                </x-button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
