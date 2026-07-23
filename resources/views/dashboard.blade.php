<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-3xl font-bold mb-6">Welcome to StockWise 👋</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
{{-- Card 1 --}}
                        <div class="bg-blue-500 text-white rounded-lg shadow p-6">
                            <h3 class="text-lg font-semibold">Categories</h3>
                            <p class="text-3xl mt-2">{{ $totalCategories }}</p>
                        </div>
{{-- Card 2 --}}
                        <div class = "bg-green-500 text-white rounded-lg shadow p-6">
                            
                            <h3 class="text-lg font-semibold">Products</h3>
                            <p class="text-3xl mt-2">{{ $totalProducts }}</p>
                        </div>
{{-- Card 3 --}}
                        <div class="bg-yellow-500 text-white rounded-lg shadow p-6">
                            <h3 class="text-lg font-semibold">Total stock</h3>
                            <p class=" text-3xl mt-2">{{ $totalStock }}</p>
                        </div>

{{-- Card 4  --}}
                        <div class="bg-indigo-500 text-white rounded-lg shadow p-6">
                            <h3 class="text-lg font-semibold">Inventory Cost</h3>
                            <p class="text-3xl mt-2">
                                ${{ number_format($inventoryCost, 0) }}
                            </p>
                        </div>



{{-- Card 5--}}
                        <div class="bg-red-500 text-white rounded-lg shadow p-6"><h3 class="text-lg font-semibold">Inventory Value</h3>
                        <p class="text-3xl mt-2">${{ number_format($inventoryValue, 2) }}</p>
                    </div>

{{-- Card 6 --}}

                    <div class="bg-purple-500 text-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold">Expected Profit
                        </h3>
                        <p class="text-3xl mt-2">${{ number_format($expectedProfit,0) }}</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
