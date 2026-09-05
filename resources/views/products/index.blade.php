<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Products
        </h2>
    </x-slot>
    <div class = "py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

{{-- search products --}}


            <div class = "flex justify-between items-center mb-6">
                <a href="/products/create" class="bg-blue-600 text-white px-4 py-2 rounded"> + Add Product</a>
                <form action="{{ route('products.index') }}" method="GET" class="flex gap-2">
                    <input 
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Search by product name or SKU.."
                    class="border rounded px-4 py-2 w-72">
                    
                    <select name="category" class="border rounded px-5 py-2 pr-10">
                        <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                            
                        </option>
                        @endforeach
                        
                    </select>

            
                <button class="bg-green-600 text-white px-4 py-2 rounded">
                    Search
                </button>
                </form>
            </div>
{{-- search end --}}

                <div class="mt-6">
                    @if ($products->count())
                    <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border p-3">ID</th>
                                <th class="border p-3">Category</th>
                                <th class="border p-3">Image</th>
                                <th class="border p-3">Name</th>
                                <th class="border p-3">SKU</th>
                                <th class="border p-3">Cost Price</th>
                                <th class="border p-3">Selling Price</th>
                                <th class="border p-3">Quantity </th>
                                <th class="border p-3"> Status</th>
                                <th class="border p-3">Actions</th>

                            </tr>    

                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td class="border p-3">{{$product->id  }}</td>
                                <td class="border p-3">{{ $product->category->name }}</td>
                                
                            {{-- Product image --}}
                                <td class="border p-3">
                                    @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                    class="w-16 h-16 object-cover rounded">

                                    @else
                                    No image
                                    @endif

                                </td>

                                
                                <td class="border p-3">{{ $product->name }}</td>
                                <td class="border p-3">{{ $product->sku }}</td>
                                <td class="border p-3">{{ number_format($product->cost_price,2) }}</td>
                                <td class="border p-3">{{ number_format($product->selling_price,2) }}</td>
                                <td class="border p-3 text-center">{{ $product->quantity }}</td>
                                <td class="border p-3 text-center" >
                                    @if($product->quantity==0)
                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">Depleted</span>

                                    @elseif($product->quantity <= 5)
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">
                                        Low Stock

                                    </span>

                                    @else
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold" >
                                        In Stock 

                                    </span>
                                    @endif
                                </td>
                                <td class="border p-3">
    <div class="flex items-center gap-2 whitespace-nowrap">

        <a href="{{ route('products.edit', $product->id) }}"
        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
            Edit
        </a>

        <form action="{{ route('products.destroy', $product->id) }}"
            method="POST"
            class="inline">
            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded"
                onclick="return confirm('Are you sure you want to delete this product?')">
                Delete
            </button>
        </form>

    </div>
</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="mt-4">
                        {{ $products->links() }}

                    </div>

                    @else
                    <p> No products found.</p>

                    
                    
                    @endif

                </div>

            </div>

        </div>

    </div>
</x-app-layout>