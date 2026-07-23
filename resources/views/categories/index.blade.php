<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Categories
        </h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Add category</a>
        <table class ="w-full mt-6 border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Name</th>
                    
                    <th class="border p-2">Description</th>
                    <th class="border p-2">Status</th>
                    
    </a>
</td>

                </tr>
            </thead>

            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td class="border p-2">{{ $category->id }}</td>
                    <td class="border p-2">{{ $category->name }}</td>
                    <td class="border p-2">{{ $category->description }}</td>
                    <td class="border p-2">
                        {{ $category->status ? 'Active' : 'Inactive' }}
                    </td>
                    <td class="border p-2">
    <a href="{{ route('categories.edit', $category->id) }}"
    class="bg-yellow-500 text-white px-3 py-1 rounded">
        Edit
    </a>
    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button
            class="bg-red-600 text-white px-3 py-1 rounded"
            type="submit" onclick="return confirm('Are you sure you want to delete this category?')">
            
            Delete
        </button>
    </form>
</td>
                </tr>

                
                @endforeach

</td>
            </tbody>

        </table>

    </div>
</x-app-layout>