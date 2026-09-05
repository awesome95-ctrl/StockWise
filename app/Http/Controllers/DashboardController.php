<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Total categories belonging to this user
        $totalCategories = Category::where('user_id', $userId)->count();

        // Total products belonging to this user
        $totalProducts = Product::where('user_id', $userId)->count();

        // Total stock belonging to this user
        $totalStock = Product::where('user_id', $userId)->sum('quantity');

        // Low stock products belonging to this user
        $lowStockProducts = Product::where('user_id', $userId)
            ->where('quantity', '<=', 5)
            ->where('quantity', '>', 0)
            ->orderBy('quantity')
            ->take(5)
            ->get();

        // Get only this user's products
        $products = Product::where('user_id', $userId)->get();

        $inventoryCost = 0;
        $inventoryValue = 0;

        foreach ($products as $product) {

            $inventoryCost += $product->cost_price * $product->quantity;

            $inventoryValue += $product->selling_price * $product->quantity;
        }

        $expectedProfit = $inventoryValue - $inventoryCost;

        // Products by category — only this user's categories/products
        $productsByCategory = Category::where('user_id', $userId)
            ->withCount('products')
            ->get();

        // Recent products belonging to this user
        $recentProducts = Product::where('user_id', $userId)
            ->with('category')
            ->latest()
            ->take(5)
            ->get();

        // Today's sales belonging to this user
        $todaySales = Sale::where('user_id', $userId)
            ->whereDate('created_at', today());

        $revenueToday = $todaySales->sum('total_amount');

        $totalSalesToday = $todaySales->count();

        return view('dashboard', compact(
            'totalCategories',
            'totalProducts',
            'totalStock',
            'inventoryCost',
            'inventoryValue',
            'expectedProfit',
            'lowStockProducts',
            'productsByCategory',
            'recentProducts',
            'revenueToday',
            'totalSalesToday',
        ));
    }
}