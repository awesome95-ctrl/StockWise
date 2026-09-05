<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\StockMovement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::where('user_id', Auth::id())
            ->with('user')
            ->latest()
            ->paginate(3);

        return view('sales.index', compact('sales'));
    }


    public function create()
    {
        $products = Product::where('user_id', Auth::id())
            ->where('quantity', '>', 0)
            ->get();

        return view('sales.create', compact('products'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {

            $totalAmount = 0;

            // Create the sale for the logged-in user
            $sale = Sale::create([
                'invoice_number' => 'INV-' . now()->format('YmdHis'),
                'user_id' => Auth::id(),
                'total_amount' => 0,
            ]);

            foreach ($request->items as $item) {

                // Only find a product belonging to the logged-in user
                $product = Product::where('id', $item['product_id'])
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

                // Make sure there is enough stock
                if ($item['quantity'] > $product->quantity) {

                    throw new \Exception(
                        "Not enough stock for {$product->name}."
                    );
                }

                $subtotal = $product->selling_price * $item['quantity'];

                $totalAmount += $subtotal;

                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'unit_price' => $product->selling_price,
                    'subtotal' => $subtotal,
                ]);

                StockMovement::create([
                    'product_id' => $product->id,
                    'type' => 'sale',
                    'quantity' => -$item['quantity'],
                    'note' => 'Sale ' . $sale->invoice_number,
                ]);

                // Reduce stock
                $product->decrement(
                    'quantity',
                    $item['quantity']
                );
            }

            // Update final sale total
            $sale->update([
                'total_amount' => $totalAmount,
            ]);
        });

        return redirect()
            ->route('sales.index')
            ->with('success', 'Sale completed successfully.');
    }


    public function show(Sale $sale)
    {
        $this->authorizeSale($sale);

        $sale->load('user', 'saleItems.product');

        return view('sales.show', compact('sale'));
    }


    public function edit(Sale $sale)
    {
        $this->authorizeSale($sale);
    }


    public function update(Request $request, Sale $sale)
    {
        $this->authorizeSale($sale);
    }


    public function destroy(Sale $sale)
    {
        $this->authorizeSale($sale);
    }


    /**
     * Make sure the sale belongs to the logged-in user.
     */
    private function authorizeSale(Sale $sale)
    {
        abort_unless(
            $sale->user_id === Auth::id(),
            403
        );
    }
}