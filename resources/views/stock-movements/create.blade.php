<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Restock Inventory
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto">

            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg">

                    <ul class="list-disc ml-5">

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>
            @endif

            <div class="bg-white shadow rounded-lg p-6">

                <div class="mb-6">

                    <h1 class="text-2xl font-bold">
                        Restock Product
                    </h1>

                    <p class="text-gray-500 mt-1">
                        Add new stock to your inventory.
                    </p>

                </div>

                <form method="POST"
                      action="{{ route('stock-movements.store') }}">

                    @csrf

                    <!-- Product -->

                    <div class="mb-5">

                        <label class="block font-semibold mb-2">
                            Product
                        </label>

                        <select name="product_id"
                                class="w-full border-gray-300 rounded-lg"
                                required>

                            <option value="">
                                Select a product
                            </option>

                            @foreach($products as $product)

                                <option value="{{ $product->id }}">

                                    {{ $product->name }}
                                    — Current stock: {{ $product->quantity }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Quantity -->

                    <div class="mb-5">

                        <label class="block font-semibold mb-2">
                            Quantity
                        </label>

                        <input type="number"
                               name="quantity"
                               min="1"
                               class="w-full border-gray-300 rounded-lg"
                               placeholder="e.g. 20"
                               required>

                    </div>

                    <!-- Note -->

                    <div class="mb-6">

                        <label class="block font-semibold mb-2">
                            Note
                        </label>

                        <textarea name="note"
                                  rows="3"
                                  class="w-full border-gray-300 rounded-lg"
                                  placeholder="e.g. New supplier delivery"></textarea>

                    </div>

                    <button type="submit"
                            class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-lg">

                        <i class="fa-solid fa-boxes-stacked mr-2"></i>

                        Restock

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>