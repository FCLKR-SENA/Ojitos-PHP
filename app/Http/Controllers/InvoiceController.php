<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        $facturas = Factura::with('facturaDetails.product')->get();
        return view('invoices.index', compact('facturas'));
    }

    public function show($id)
    {
        $factura = Factura::with('facturaDetails.product', 'users')->findOrFail($id);
        return view('invoices.show', compact('factura'));
    }

    public function userInvoices()
    {
        $userId = Auth::id();
        $facturas = Factura::with('facturaDetails.product')
            ->where('usuarios_id_usuario', $userId)
            ->get();

        return view('invoices.user-invoices', compact('facturas'));
    }

    public function userInvoiceDetails($id)
    {
        $userId = Auth::id();
        $factura = Factura::with('facturaDetails.product', 'users')
            ->where('usuarios_id_usuario', $userId)
            ->findOrFail($id);

        return view('invoices.user-invoice-details', compact('factura'));
    }
}
