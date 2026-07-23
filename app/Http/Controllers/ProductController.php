<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        // $products = Product::all();
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }
    public function create(){
        $categories = Category::all();
        return view('products.create', compact('categories'));

    }

    public  function store(Request $request){
        
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|max:255',
        'cost_price' => 'required|numeric',
        'selling_price' => 'required|numeric',
        'quantity' => 'required|integer',
        'description' => 'nullable'
    ]);

    Product::create([
        'category_id' => $request-> category_id,
        'sku' => 'SKU-' . time(),
        'name' => $request->name,
        'cost_price' => $request->cost_price,
        'selling_price'=> $request->selling_price,
        'quantity' => $request->quantity,
        'description' => $request->description,

    ]);

    return redirect()
        ->route('products.index')
        ->with('success', 'Product created successfully');
        
    }
    public function show(Product $product){

    }

    public function edit(string $id){
        $product = Product:: findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));

    }

    public function update( Request $request,Product $product){
        $request->validate([
            'category_id'=>'required|exists:categories,id',
            'name' => 'required|max:255',
            'cost_price' =>'required|numeric',
            'selling_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' =>'nullable',
        ]);
        $product ->update([
            'category_id' => $request->category_id,
            'name'=> $request->name,
            'cost_price' => $request->cost_price,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'description' => $request->description,

        ]);

        return redirect()->route('products.index')->with('success', 'Product Updated Successfully.');


    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully.');

    }
}
