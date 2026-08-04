<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Sales
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto">

            <div class="mb-4">

                <a href="{{ route('sales.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded">

                    New Sale

                </a>

            </div>

            <div class="bg-white shadow rounded">

                <table class="min-w-full">

                    <thead>

                        <tr class="border-b">

                            <th class="text-left p-4">Invoice</th>
                            <th class="text-left p-4">Cashier</th>
                            <th class="text-left p-4">Total</th>
                            <th class="text-left p-4">Date</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($sales as $sale)

                        <tr class="border-b">

                            <td class="p-4">{{ $sale->invoice_number }}</td>

                            <td class="p-4">{{ $sale->user->name }}</td>

                            <td class="p-4">
                                ₦{{ number_format($sale->total_amount,2) }}
                            </td>

                            <td class="p-4">
                                {{ $sale->created_at->format('d M Y') }}
                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4" class="text-center p-6">

                                No sales yet.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>