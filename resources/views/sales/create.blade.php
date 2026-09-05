<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            New Sale
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('sales.store') }}" method="POST">

                    @csrf
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-2">

                    

                    <div id="sale-items">

                        <div class="sale-item grid grid-cols-1 lg:grid-cols-3 gap-6 ">
                            {{-- Products --}}
                            <div class="lg:col-span-2">
                                <label class="block font-semibold mb-2">
                                    Product
                                </label>

                                <select name="items[0][product_id]"
                                        class="w-full border rounded p-2 product-select"
                                        required>

                                    <option value="">Select Product</option>

                                    @foreach($products as $product)

                                        <option value="{{ $product->id }}"
                                                data-price="{{ $product->selling_price }}"
                                                data-stock="{{ $product->quantity }}">

                                            {{ $product->name }}
                                            — Stock: {{ $product->quantity }}

                                        </option>

                                    @endforeach

                                </select>
                            </div>

                            <div>
                                <label class="block font-semibold mb-2">
                                    Quantity
                                </label>

                                <input type="number"
                                       name="items[0][quantity]"
                                       min="1"
                                       value="1"
                                       class="w-full border rounded p-2"
                                       required>
                            </div>

                            <div class="flex items-end">

                                <button type="button"
                                        class="remove-item bg-red-500 text-white px-4 py-2 rounded">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </div>

                        </div>

                    </div>

                    <button type="button"
                            id="add-item"
                            class="bg-gray-700 text-white px-4 py-2 rounded mb-6">

                        <i class="fa-solid fa-plus"></i>
                        Add Product

                    </button>

                    <div class="border-t pt-4">

                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded">

                            <i class="fa-solid fa-cart-shopping"></i>
                            Complete Sale

                        </button>

                    </div>
                    </div>
                    <div class="lg:col-span-1">
                        <div class="bg-white shadow rounded-lg p-6 sticky top-6">
                            <div class="flex items-center mb-5">
                                <i class="fa-solid fa-receipt text-blue-600 text-xl mr-3"></i>
                                <h2 class="text-xl font-bold">
                                    Sale Summary
                                </h2>
                            </div>

                        <div id="sale-summary" class="space-y-3">
                        <p class="text-gray-500 text-sm">
                            No products selected
                        </p>
                    </div>
                    <div class="border-t mt-5 pt-5">
                        <div class="flex justify-between items-center">
                                <span class="font-semibold text-gray-600">
                                    Total
                                </span>
                                <span id = "sale-total"
                                class="text-2xl font-bold text-blue-600 ">
                                ₦0.00
                            </span>
                            

                        </div>

                    </div>
                    </div>
                </div>
                </form>

            </div>

        </div>
    </div>

    <script>

        let itemIndex = 1;
// Add product
        document.getElementById('add-item').addEventListener('click', function () {

            const container = document.getElementById('sale-items');

            const firstItem = document.querySelector('.sale-item');

            const newItem = firstItem.cloneNode(true);

            newItem.querySelector('select').name =
                `items[${itemIndex}][product_id]`;

            newItem.querySelector('select').value = '';

            newItem.querySelector('input').name =
                `items[${itemIndex}][quantity]`;

            newItem.querySelector('input').value = 1;

            container.appendChild(newItem);

            itemIndex++;
            updateSaleSummary();

        });

// Remove product
        document.addEventListener('click', function (event) {

            if (event.target.closest('.remove-item')) {

                const items = document.querySelectorAll('.sale-item');

                if (items.length > 1) {

                    event.target.closest('.sale-item').remove();


                }
            updateSaleSummary();
            }
            

        });

        function updateSaleSummary(){   
            const summary = document.getElementById('sale-summary');
            const totalElement = document.getElementById('sale-total');

            let total = 0;

            summary.innerHTML = '';
            const items = document.querySelectorAll('.sale-item');

            let hasProducts = false;
            items.forEach(item => {
                const select = item.querySelector('.product-select');
                const quantityInput = item.querySelector('input[type="number"]');

                if(!select || !quantityInput || !select.value){
                    return
                }
                const option = select.options[select.selectedIndex];
                const price = parseFloat(option.dataset.price) || 0;
                const quantity = parseInt(quantityInput.value) || 0;

                const subtotal = price * quantity;

                total += subtotal;
                hasProducts = true;

                const row = document.createElement('div');
                row.className = 'flex justify-between text-sm';
                row.innerHtml = `<div>
                    <p class="font-medium">
                        ${option.text.split(' - stock:')[0]}
                        </p>
                    
                    <p class = " text-gray-500">
                        ${quantity} * ₦${price.toFixed(2)}
                        </p>
                    </div>

                    <span class ="font-semibold">
                        ₦${subtotal.toFixed(2)}
                        </span>
                        `;
                        summary.appendChild(row);
            });
            if(!hasProducts){
                summary.innerHTML = `<p class = "text-gray-500 text-sm">
                    No products selected.</p>
                    `;
            }
            totalElement.textContent = `₦${total.toFixed(2)}`;
        }
        updateSaleSummary();
        document.addEventListener('change', function(event){
            
            if(
                event.target.classList.contains('product-select') ||
                event.target.matches('input[type="number"]')
            ){
                updateSaleSummary();
            }
        })

    </script>

</x-app-layout>