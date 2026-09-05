<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Stock Movement History
        </h2>
    </x-slot>

    <div class="py-8 px-6">

        <div class="max-w-7xl mx-auto">

            <!-- Page Header -->
            <div class="flex justify-between items-center mb-6">

                <div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        Inventory History
                    </h1>

                    <p class="text-gray-500 mt-1">
                        Track every stock increase and decrease.
                    </p>
                </div>

                <a href="{{ route('stock-movements.create') }}"
                   class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-3 rounded-lg transition">

                    <i class="fa-solid fa-boxes-stacked mr-2"></i>

                    Restock

                </a>

            </div>


            <!-- Movement Table -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="bg-gray-50 border-b">

                            <tr>

                                <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">
                                    Product
                                </th>

                                <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">
                                    Type
                                </th>

                                <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">
                                    Quantity
                                </th>

                                <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">
                                    Note
                                </th>

                                <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">
                                    Date
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($movements as $movement)

                                <tr class="border-b hover:bg-gray-50 transition">

                                    <!-- Product -->
                                    <td class="px-6 py-4 font-medium text-gray-800">
                                        {{ $movement->product->name }}
                                    </td>


                                    <!-- Type -->
                                    <td class="px-6 py-4">

                                        @if($movement->type === 'restock')

                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-100 text-green-700">

                                                <i class="fa-solid fa-arrow-up mr-2"></i>

                                                Restock

                                            </span>

                                        @elseif($movement->type === 'sale')

                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-red-100 text-red-700">

                                                <i class="fa-solid fa-arrow-down mr-2"></i>

                                                Sale

                                            </span>

                                        @else

                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-yellow-100 text-yellow-700">

                                                <i class="fa-solid fa-pen mr-2"></i>

                                                Adjustment

                                            </span>

                                        @endif

                                    </td>


                                    <!-- Quantity -->
                                    <td class="px-6 py-4 font-semibold">

                                        @if($movement->quantity > 0)

                                            <span class="text-green-600">
                                                +{{ $movement->quantity }}
                                            </span>

                                        @else

                                            <span class="text-red-600">
                                                {{ $movement->quantity }}
                                            </span>

                                        @endif

                                    </td>


                                    <!-- Note -->
                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $movement->note ?? '—' }}
                                    </td>


                                    <!-- Date -->
                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $movement->created_at->format('d M Y, h:i A') }}
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5"
                                        class="text-center py-10 text-gray-500">

                                        <i class="fa-solid fa-box-open text-3xl mb-3"></i>

                                        <p>
                                            No stock movements recorded yet.
                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                <!-- Pagination -->
                @if($movements->hasPages())

                    <div class="px-6 py-4 border-t">
                        {{ $movements->links() }}
                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>