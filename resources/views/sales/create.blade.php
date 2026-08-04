<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            New Sale
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto">

            <div class="bg-white shadow rounded p-6">

                <form action="{{ route('sales.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label class="block font-semibold mb-2">
                            Product
                        </label>

                        <select
                            name="product_id"
                            class="w-full border rounded p-2"
                            required>

                            <option value="">Select Product</option>

                            @foreach($products as $product)
                                <option value="{{ $product->id }}">
                                    {{ $product->name }}
                                    (Stock: {{ $product->quantity }})
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-2">
                            Quantity
                        </label>

                        <input
                            type="number"
                            name="quantity"
                            min="1"
                            class="w-full border rounded p-2"
                            required>
                    </div>

                    <button
                        class="bg-blue-600 text-white px-6 py-2 rounded">

                        Complete Sale

                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>