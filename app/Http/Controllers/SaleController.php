<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('user')
            ->latest()
            ->paginate(7);

        return view('sales.index', compact('sales'));
    }

    public function create(){
        $products = Product::where('quantity', '>', 0)->get();

        return view('sales.create', compact('products'));
    }

    public function store (Request $request){
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        if($request->quantity > $product->quantity){
            return back()->with('error', 'Not enough stock available');
        }

        DB::transaction(function() use ($request, $product){
            $sale = Sale::create([
                'invoice_number' => 'INV-' . now()->format('YmdHis'),
                'user_id' => Auth::id(),
                'total_amount' => $product->selling_price* $request->quantity,

            ]);
            SaleItem::create([
                'sale_id' => $sale->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'unit_price' => $product->selling_price,
                'subtotal' => $product->selling_price * $request->quantity,
            ]);

            $product ->decrement('quantity', $request->quantity);
                
        
        });

        return redirect()
            ->route('sales.index')
            ->with('success', 'Sale Completed Successfully');
    }

    public function show(Sale $sale){}
    public function edit(Sale $sale){}
    public function update(Request $request, Sale $sale){}
    public function destroy(Sale $sale){}
    }
