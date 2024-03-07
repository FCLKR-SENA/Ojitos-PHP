<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('ProductAdmin.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'descripcion' => 'required',
            'stock' => 'required|integer',
            'img' => 'nullable|image',
        ]);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->descripcion = $request->descripcion;
        $product->stock = $request->stock;

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imagePath = $image->store('product_images', 'public');
            $product->img = $imagePath;
        }

        $product->save();

        return redirect()->route('ProductAdmin.index')->with('success', 'Producto registrado exitosamente.');
    }

    public function edit(Product $product)
    {
        return view('ProductAdmin.editar', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'descripcion' => 'required',
            'stock' => 'required|integer',
            'img' => 'nullable|image',
        ]);

        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->descripcion = $request->descripcion;
        $product->stock = $request->stock;

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imagePath = $image->store('product_images', 'public');
            $product->img = $imagePath;
        }
    }
}
