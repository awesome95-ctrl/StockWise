<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto bg-white shadow rounded-lg p-6">
            <form method="POST" action="{{route('products.update', $product->id) }}">
                @csrf
                @method ('PUT')
                
                <div class="mb-4">
                    <label class="block font-medium">Category</label>
                    <select name="category_id" class="border rounded w-full p-2">
                        @foreach($categories as $category)
                        <option value="{{ $category-> id }}"
                            {{ $product->category_id == $category->id ? 'selected' : ''}}>
                            {{ $category->name }}

                        </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                </div>
                
                
                <div class="mb-4">
                    <label class="block font-medium">Product Name</label>
                    <input type="text"
                    name="name"
                    value="{{ old('name', $product->name) }}"
                    class="w-full border rounded p-2">
                    @error('name')
                    <p class="text-red-500 text-sm">{{  $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Cost Price</label>
                    <input type="text" name="cost_price"
                    value="{{ old('cost_price', $product->cost_price) }}"
                    class="w-full border rounded p-2">
                    @error('cost_price')
                    <p class="text-red-500 text-sm">{{  $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Selling Price</label>
                    <input type="text" name="selling_price"
                    value="{{ old('selling_price',$product->selling_price ) }}"
                    class="w-full border rounded p-2">
                    @error('selling_price')
                    <p class="text-red-500 text-sm">{{  $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Quantity</label>
                    <input type="text" name="quantity"
                    value="{{ old('quantity',$product->quantity ) }}"
                    class="w-full border rounded p-2">
                    @error('quantity')
                    <p class="text-red-500 text-sm">{{  $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Description</label>
                    <textarea name="description" class="w-full border rounded p-2">{{ old('description', $product->description) }}</textarea>
                    
                    @error('description')
                    <p class="text-red-500 text-sm">{{  $message }}</p>
                    @enderror
                </div>

                <button class="bg-blue-600 text-white px-4 py-2 rounded">
                    Update Product
                </button>

            
                
            </form>

            


                

            </div>

            </div>

        </div>

    </div>
</x-app-layout>