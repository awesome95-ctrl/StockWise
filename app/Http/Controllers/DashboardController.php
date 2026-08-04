<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(){
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $totalStock = Product::sum('quantity');
        $lowStockProducts = Product::where('quantity', '<=', 5)
        ->where('quantity', '>',0)
        ->orderBy('quantity')
        ->take(5)   
        ->get();

        $products = Product::all();

        $inventoryCost = 0;
        $inventoryValue = 0;

        foreach ($products as $product){
            $inventoryCost += $product->cost_price * $product->quantity;
            $inventoryValue += $product->selling_price * $product->quantity;
        }

        $expectedProfit = $inventoryValue - $inventoryCost;
        $productsByCategory = Category::withCount('products')->get();
        $recentProducts = Product::with('category')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalCategories',
            'totalProducts',
            'totalStock',
            'inventoryCost',
            'inventoryValue',
            'expectedProfit',
            'lowStockProducts',
            'productsByCategory',
            'recentProducts'
        ));
    }
}
