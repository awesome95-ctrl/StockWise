<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto bg-white shadow rounded-lg p-6">
            <form method="POST" action="{{route('products.store')}}">
                @csrf
                
                <select name="category_id" class="border rounded w-full p-2">
                @foreach($categories as $category)

                    <option value="{{ $category->id }}"> {{ $category->name }} 
                    </option>
                @endforeach
                </select>
                
                
                <div class="mb-4">
                    <label class="block font-medium">Product Name</label>
                    <input type="text" name="name" class="w-full border rounded p-2">
                    @error('name')
                    <p class="text-red-500 text-sm">{{  $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Cost Price</label>
                    <input type="text" name="cost_price" class="w-full border rounded p-2">
                    @error('cost_price')
                    <p class="text-red-500 text-sm">{{  $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Selling Price</label>
                    <input type="text" name="selling_price" class="w-full border rounded p-2">
                    @error('selling_price')
                    <p class="text-red-500 text-sm">{{  $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Quantity</label>
                    <input type="text" name="quantity" class="w-full border rounded p-2">
                    @error('quantity')
                    <p class="text-red-500 text-sm">{{  $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <textarea class="block font-medium">Description</textarea>
                    
                    @error('description')
                    <p class="text-red-500 text-sm">{{  $message }}</p>
                    @enderror
                </div>

                <button class="bg-blue-600 text-white px-4 py-2 rounded">
                    Save Product
                </button>

                <div class="mb-4">
                <label>Category</label>
                
            </form>

            


                

            </div>

            </div>

        </div>

    </div>
</x-app-layout>