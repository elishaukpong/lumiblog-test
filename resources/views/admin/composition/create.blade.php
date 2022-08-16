<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Composition
        </h2>
    </x-slot>

    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-60">
        <form method="POST" action="{{ route('admin.composition.store', $pathModel->id) }}" class="py-16">
            @csrf

            <x-label for="name" :value="'Name'" />
            <x-input id="name" class="block mt-1 w-full mb-4" type="text" name="name" :value="old('name')" required />

            <!-- Email Address -->
            <div>
                @foreach($pathModel->columns as $column)
                    <x-label for="composition" :value="ucwords($column->name)" />

                    <select name="composition[{{$column->name}}_id]" class="rounded-md shadow-sm border-gray-300 block mt-1 w-full mb-4" required>
                        <option value="">Select {{ucwords($column->name)}} Variant</option>
                        @foreach($column->variants as $variant)
                            <option value="{{$variant->id}}" class="">{{$variant->value}}</option>
                        @endforeach
                    </select>
                @endforeach

            </div>

            <div class="flex items-center justify-end mt-4  text-center">
                <x-button class="w-full md:inline-block">
                    Create Composition
                </x-button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
