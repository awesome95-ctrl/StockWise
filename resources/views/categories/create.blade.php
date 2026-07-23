<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Add Category
        </h2>
    </x-slot>
    <div class="p-6">
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="mb-4">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="border rounded w-full p-2">

                @error('name')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-4">
                <label>Description</label>

                <textarea name="description" class="border rounded w-full p-2">{{ old('description') }}
                    

                </textarea>

            </div>
            <button class="bg-green-600 text-white px-4 py-2 rounded" type="submit">
                Save Category
            </button>

            <div class="mb-4">
                <label> Category </label>
                {{-- <select name="category_id" class = "border rounded w-full p-2">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                    @endforeach --}}
                </select>

            </div>

        </form>

    </div>
</x-app-layout>