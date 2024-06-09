<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'promo' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images/products'), $imageName);

        Product::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'promo' => $request->promo,
            'image' => $imageName,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'promo' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product->update($request->except('image'));

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/images/products/' . $product->image);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images/products', $imageName);

            $product->update(['image' => $imageName]);
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
