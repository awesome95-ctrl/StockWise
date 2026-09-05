<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Sale Details
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white shadow rounded-lg p-8">
                <div class="flex justify-between mb-8">
                    <div>
                        <h1 class="text-2xl font-bold text-blue-600" >StockWise</h1>
                        <p class="text-gray-500">
                            Sales Invoice
                        </p>
                    </div>

                    <div class="text-right">
                        <p>
                            <strong>Invoice:</strong>
                            {{ $sale->invoice_number }}
                        </p>

                        <p>
                            <strong>
                                Date:
                            </strong>
                            {{ $sale->created_at->format('d M Y, h:i A') }}
                        </p>

                        <p>
                            <strong>Cashier:</strong>
                            {{ $sale->user->name }}
                        </p>
                    </div>

                </div>
                <table class="min-w-full mb-8">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-3">Product</th>
                            <th class="text-left py-3">Quantity</th>
                            <th class="text-left py-3">Unit Price</th>
                            <th class="text-left py-3">Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($sale->saleItems as $item)
                        <tr class="border-b">
                            <td class="py-3">
                                {{ $item->product->name }}
                            </td>
                            <td class="py-3">
                                {{ $item->quantity }}

                            </td>
                            <td class="py-3">
                                ₦{{ number_format($item->unit_price, 2) }}
                            </td>

                            <td class="py-3">
                                ₦{{ number_format($item->subtotal, 2) }}

                            </td>

                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
                <div class="flex justify-end">
                    <p class="text-xl font-bold">
                        Total:
                        ₦{{ number_format($sale->total_amount, 2) }}
                    </p>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>