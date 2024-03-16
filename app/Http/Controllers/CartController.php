<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product): \Illuminate\Http\RedirectResponse
    {
        try {
            $cart = session()->get('cart', []);

            if (isset($cart[$product->id_product])) {
                $cart[$product->id_product]['quantity']++;
            } else {
                $cart[$product->id_product] = [
                    "product_name" => $product->product_name,
                    "quantity" => 1,
                    "product_price" => $product->product_price,
                    "img" => $product->img
                ];
            }

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while adding the product to the cart.');
        }
    }

    public function update(Request $request)
    {
        try {
            if ($request->id && $request->quantity) {
                $cart = session()->get('cart');
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
            }
            return response()->json(['success' => 'Cart updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating the cart.']);
        }
    }

    public function remove(Request $request)
    {
        try {
            if ($request->id) {
                $cart = session()->get('cart');
                if (isset($cart[$request->id])) {
                    unset($cart[$request->id]);
                    session()->put('cart', $cart);
                }
            }
            return response()->json(['success' => 'Product removed successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while removing the product from the cart.']);
        }
    }

    public function showCart()
    {
        return view('ProductUser.cart');
    }
}
