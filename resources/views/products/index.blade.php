<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Products
        </h2>
    </x-slot>
    <div class = "py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                <a href="/products/create" class="bg-blue-600 text-white px-4 py-2 rounded"> + Add Product</a>

                <div class="mt-6">
                    @if ($products->count())
                    <table class="min-w-full border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border p-3">ID</th>
                                <th class="border p-3">Category</th>
                                <th class="border p-3">Name</th>
                                <th class="border p-3">SKU</th>
                                <th class="border p-3">Cost Price</th>
                                <th class="border p-3">Selling Price</th>
                                <th class="border p-3">Quantity </th>
                                <th class="border p-3">Actions</th>

                            </tr>    

                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td class="border p-3">{{$product->id  }}</td>
                                <td class="border p-3">{{ $product->category->name }}</td>
                                <td class="border p-3">{{ $product->name }}</td>
                                <td class="border p-3">{{ $product->sku }}</td>
                                <td class="border p-3">{{ number_format($product->cost_price,2) }}</td>
                                <td class="border p-3">{{ number_format($product->selling_price,2) }}</td>
                                <td class="border p-3">{{ $product->quantity }}</td>
                                <td class="border p-3">
                                    <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>

                                    <form action="{{ route('products.destroy', $product->id) }}"method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                    </form>
                                
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p> No products found.</p>

                    
                    
                    @endif

                </div>

            </div>

        </div>

    </div>
</x-app-layout>