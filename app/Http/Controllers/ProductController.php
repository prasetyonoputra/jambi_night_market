<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Umkm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $umkm = Umkm::get()->where("pemilik", Auth::id());

        return view('product.index', compact('products', 'umkm'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
{
    $validationRequest = $request->validate([
        'nama_product' => 'required',
        'deskripsi_produk' => 'required',
        'kategori_product' => 'required',
        'harga' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $validationRequest['image'] = $imageName;
    }

    $validationRequest['id_penjual'] = Auth::user()->id;

    Product::create($validationRequest);

    return redirect()->route('products.index')
        ->with('success', 'Produk berhasil ditambahkan!');
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
    $validationRequest = $request->validate([
        'nama_product' => 'required',
        'deskripsi_produk' => 'required',
        'kategori_product' => 'required',
        'harga' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        if ($product->image) {
            unlink(public_path('images') . '/' . $product->image);
        }

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $validationRequest['image'] = $imageName;
    }

    $product->update($validationRequest);

    return redirect()->route('products.index')->with('success', 'Berhasil update produk!.');
}

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
