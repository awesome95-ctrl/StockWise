<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StockMovementController extends Controller
{
    public function create()
    {
        $products = Product::where('user_id', Auth::id())
            ->orderBy('name')
            ->get();

        return view('stock-movements.create', compact('products'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable|string|max:255',
        ]);

        DB::transaction(function () use ($request) {

            // Only retrieve a product belonging to the logged-in user
            $product = Product::where('id', $request->product_id)
                ->where('user_id', Auth::id())
                ->firstOrFail();

            $product->increment(
                'quantity',
                $request->quantity
            );

            StockMovement::create([
                'product_id' => $product->id,
                'type' => 'restock',
                'quantity' => $request->quantity,
                'note' => $request->note ?? 'Stock restocked',
            ]);
        });

        return redirect()
            ->route('stock-movements.create')
            ->with('success', 'Stock restocked successfully.');
    }


    public function index()
    {
        $movements = StockMovement::whereHas('product', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->with('product')
            ->latest()
            ->paginate(10);

        return view('stock-movements.index', compact('movements'));
    }
}