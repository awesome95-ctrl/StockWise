<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-8 lg:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-4 sm:p-6">

                    <h2 class="text-2xl sm:text-3xl font-bold mb-6">
                        Welcome to StockWise 👋
                    </h2>


                    {{-- DASHBOARD CARDS --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">

                        {{-- Revenue Today --}}
                        <div class="bg-emerald-500 text-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">

                                <div>
                                    <h3 class="text-lg font-semibold">
                                        Revenue Today
                                    </h3>

                                    <p class="text-3xl mt-2">
                                        ₦{{ number_format($revenueToday, 2) }}
                                    </p>
                                </div>

                                <i class="fa-solid fa-money-bill-trend-up text-4xl opacity-80"></i>

                            </div>
                        </div>


                        {{-- Sales Today --}}
                        <div class="bg-sky-500 text-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">

                                <div>
                                    <h3 class="text-lg font-semibold">
                                        Sales Today
                                    </h3>

                                    <p class="text-3xl mt-2">
                                        {{ $totalSalesToday }}
                                    </p>
                                </div>

                                <i class="fa-solid fa-cart-shopping text-4xl opacity-80"></i>

                            </div>
                        </div>


                        {{-- Categories --}}
                        <a href="{{ route('categories.index') }}">
                            <div class="bg-blue-500 text-white rounded-lg shadow p-6 hover:bg-red-600 hover:scale-105 transition duration">

                                <h3 class="text-lg font-semibold">
                                    Categories
                                </h3>

                                <p class="text-3xl mt-2">
                                    {{ $totalCategories }}
                                </p>

                            </div>
                        </a>


                        {{-- Products --}}
                        <a href="{{ route('products.index') }}">
                            <div class="bg-green-500 text-white rounded-lg shadow p-6 hover:bg-cyan-600 hover:scale-105 transition duration">

                                <h3 class="text-lg font-semibold">
                                    Products
                                </h3>

                                <p class="text-3xl mt-2">
                                    {{ $totalProducts }}
                                </p>

                            </div>
                        </a>


                        {{-- Total Stock --}}
                        <a href="{{ route('products.index') }}">
                            <div class="bg-yellow-500 text-white rounded-lg shadow p-6 hover:bg-green-600 hover:scale-105 transition duration">

                                <h3 class="text-lg font-semibold">
                                    Total Stock
                                </h3>

                                <p class="text-3xl mt-2">
                                    {{ $totalStock }}
                                </p>

                            </div>
                        </a>


                        {{-- Inventory Cost --}}
                        <a href="{{ route('products.index') }}">
                            <div class="bg-indigo-500 text-white rounded-lg shadow p-6 hover:bg-indigo-600 hover:scale-105 transition duration">

                                <h3 class="text-lg font-semibold">
                                    Inventory Cost
                                </h3>

                                <p class="text-3xl mt-2">
                                    ₦{{ number_format($inventoryCost, 0) }}
                                </p>

                            </div>
                        </a>


                        {{-- Inventory Value --}}
                        <a href="{{ route('products.index') }}">
                            <div class="bg-red-500 text-white rounded-lg shadow p-6 hover:bg-indigo-600 hover:scale-105 transition duration">

                                <h3 class="text-lg font-semibold">
                                    Inventory Value
                                </h3>

                                <p class="text-3xl mt-2">
                                    ₦{{ number_format($inventoryValue, 2) }}
                                </p>

                            </div>
                        </a>


                        {{-- Expected Profit --}}
                        <a href="{{ route('products.index') }}">
                            <div class="bg-purple-500 text-white rounded-lg shadow p-6 hover:bg-teal-600 hover:scale-105 transition duration">

                                <h3 class="text-lg font-semibold">
                                    Expected Profit
                                </h3>

                                <p class="text-3xl mt-2">
                                    ₦{{ number_format($expectedProfit, 0) }}
                                </p>

                            </div>
                        </a>

                    </div>
                    {{-- END DASHBOARD CARDS --}}



                    {{-- LOW STOCK --}}
                    <div class="mt-8 bg-white rounded-lg shadow p-4 sm:p-6">

                        <h2 class="text-xl font-bold mb-4">
                            Low Stock Products
                        </h2>

                        @if ($lowStockProducts->count())

                            <ul class="divide-y">

                                @foreach($lowStockProducts as $product)

                                    <li class="py-3 flex items-center justify-between gap-4">

                                        <span>
                                            {{ $product->name }}
                                        </span>

                                        <span class="text-red-600 whitespace-nowrap">
                                            {{ $product->quantity }} left
                                        </span>

                                    </li>

                                @endforeach

                            </ul>

                        @else

                            <p class="text-green-600">
                                No products are running low
                            </p>

                        @endif

                    </div>
                    {{-- END LOW STOCK --}}



                    {{-- RECENT PRODUCTS --}}
                    <div class="mt-8 bg-white rounded-lg shadow p-4 sm:p-6">

                        <h2 class="text-xl font-bold mb-4">
                            Recent Products
                        </h2>

                        <div class="overflow-x-auto">

                            <table class="min-w-full">

                                <thead>
                                    <tr class="border-b">

                                        <th class="text-left py-2 px-2">
                                            Image
                                        </th>

                                        <th class="text-left py-2 px-2">
                                            Product
                                        </th>

                                        <th class="text-left py-2 px-2">
                                            Category
                                        </th>

                                        <th class="text-left py-2 px-2">
                                            Quantity
                                        </th>

                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($recentProducts as $product)

                                        <tr class="border-b">

                                            <td class="py-2 px-2">

                                                @if($product->image)

                                                    <img
                                                        src="{{ asset('storage/'.$product->image) }}"
                                                        class="w-12 h-12 object-cover rounded"
                                                    >

                                                @else

                                                    <span class="text-gray-500">
                                                        No image
                                                    </span>

                                                @endif

                                            </td>

                                            <td class="py-2 px-2">
                                                {{ $product->name }}
                                            </td>

                                            <td class="py-2 px-2">
                                                {{ $product->category->name }}
                                            </td>

                                            <td class="py-2 px-2">
                                                {{ $product->quantity }}
                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    </div>
                    {{-- END RECENT PRODUCTS --}}



                    {{-- PRODUCTS BY CATEGORY --}}
                    <div class="mt-8 bg-white rounded-lg shadow p-4 sm:p-6">

                        <h2 class="text-xl font-bold mb-4">
                            Products by Category
                        </h2>

                        <div class="relative h-64 sm:h-80">
                            <canvas id="categoryChart"></canvas>
                        </div>

                    </div>
                    {{-- END PRODUCTS BY CATEGORY --}}


                </div>

            </div>

        </div>
    </div>



    {{-- CATEGORY CHART --}}
    <script>

        const ctx = document.getElementById('categoryChart');

        new Chart(ctx, {

            type: 'bar',

            data: {

                labels: [
                    @foreach($productsByCategory as $category)
                        "{{ $category->name }}",
                    @endforeach
                ],

                datasets: [{

                    label: 'Number of Products',

                    data: [
                        @foreach($productsByCategory as $category)
                            {{ $category->products_count }},
                        @endforeach
                    ],

                    backgroundColor: [
                        '#3B82F6',
                        '#10B981',
                        '#F59E0B',
                        '#EF4444',
                        '#8B5CF6',
                        '#06B6D4',
                        '#EC4899'
                    ],

                    borderRadius: 8

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {
                        display: false
                    }

                },

                scales: {

                    y: {

                        beginAtZero: true,

                        ticks: {
                            precision: 0
                        }

                    }

                }

            }

        });

    </script>

</x-app-layout>