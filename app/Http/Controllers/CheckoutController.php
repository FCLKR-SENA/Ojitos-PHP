<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\FacturaDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function showCheckoutForm()
    {
        return view('ProductUser.checkout');
    }

    public function processCheckout(Request $request)
    {
        // Validate the form data if needed
        $request->validate([
            // Add validation rules if required
        ]);

        // Retrieve the cart data from the session
        $cart = session('cart');

        if (empty($cart)) {
            return redirect()->route('client.cart')->with('error', 'Your cart is empty.');
        }

        // Calculate the total value of the invoice, the total IVA, and the total invoice amount
        $totalValue = 0;
        $totalIva = 0;
        foreach ($cart as $item) {
            $itemTotal = $item['product_price'] * $item['quantity'];
            $totalValue += $itemTotal;
            $totalIva += $itemTotal * 0.19; // Assuming 19% tax rate
        }
        $totalInvoice = $totalValue + $totalIva;

        // Create a new factura record
        $factura = new Factura();
        $factura->fecha_factura = now();
        $factura->usuarios_id_usuario = Auth::id();
        $factura->valor_factura = $totalValue;
        $factura->iva = $totalIva;
        $factura->total_factura = $totalInvoice; // Assign the total invoice amount to the total_factura field
        $factura->save();

        // Create factura_details records for each item in the cart
        foreach ($cart as $productId => $item) {
            $facturaDetail = new FacturaDetail();
            $facturaDetail->factura_idfactura = $factura->idfactura;
            $facturaDetail->product_id_product = $productId;
            $facturaDetail->quantity = $item['quantity'];
            $facturaDetail->products_totals = $item['product_price'] * $item['quantity'];
            $facturaDetail->iva = $item['product_price'] * $item['quantity'] * 0.19; // Assuming 19% tax rate
            $facturaDetail->descriptionF = $item['product_name'];
            $facturaDetail->save();
        }
// Clear the cart session
        session()->forget('cart');

// Redirect to the confirmation page with the order details
        return redirect()->route('checkout.confirmation', ['order' => $factura])
            ->with('success', 'Your order has been placed successfully.');
    }

    public function showConfirmation(Factura $order)
    {
        return view('ProductUser.confirmation', compact('order'));
    }
}
