<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category;

        $products = Product::where('user_id', auth()->id())
            ->with('category')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('sku', 'like', "%{$search}%");
                });
            })
            ->when($category, function ($query) use ($category) {
                $query->where('category_id', $category);
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        $categories = Category::where('user_id', auth()->id())->get();

        return view('products.index', compact(
            'products',
            'search',
            'categories'
        ));
    }


    public function create()
    {
        $categories = Category::where('user_id', auth()->id())->get();

        return view('products.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|max:255',
            'cost_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Make sure the selected category belongs to this user
        $category = Category::where('id', $request->category_id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'user_id' => auth()->id(),
            'category_id' => $category->id,
            'sku' => 'SKU-' . time(),
            'name' => $request->name,
            'image' => $imagePath,
            'cost_price' => $request->cost_price,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully');
    }


    public function show(Product $product)
    {
        $this->authorizeProduct($product);

        //
    }


    public function edit(Product $product)
    {
        $this->authorizeProduct($product);

        $categories = Category::where('user_id', auth()->id())->get();

        return view('products.edit', compact('product', 'categories'));
    }


    public function update(Request $request, Product $product)
    {
        $this->authorizeProduct($product);

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|max:255',
            'cost_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Make sure the new category belongs to this user
        $category = Category::where('id', $request->category_id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $imagePath = $product->image;

        if ($request->hasFile('image')) {

            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'category_id' => $category->id,
            'name' => $request->name,
            'cost_price' => $request->cost_price,
            'selling_price' => $request->selling_price,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully.');
    }


    public function destroy(Product $product)
    {
        $this->authorizeProduct($product);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }


    /**
     * Make sure the product belongs to the logged-in user.
     */
    private function authorizeProduct(Product $product)
    {
        abort_unless(
            $product->user_id === auth()->id(),
            403
        );
    }
}