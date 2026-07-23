<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Edit Category
        </h2>
    </x-slot>
    <div class="p-6">
        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}" class="border rounded w-full p-2">

                @error('name')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-4">
                <label>Description</label>

                <textarea name="description" class="border rounded w-full p-2">{{ old('description', $category->description) }}
                    

                </textarea>

            </div>
            <button class="bg-green-600 text-white px-4 py-2 rounded" type="submit">
                Save Category
            </button>

        </form>

    </div>
</x-app-layout>