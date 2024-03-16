<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Order Confirmation
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="T1">Order Confirmation</h1>
                    <p>Thank you for your order!</p>
                    <h2 class="text-xl font-semibold mt-6">Order Details</h2>
                    <p>Order Number: {{ $order->idfactura }}</p>
                    <p>Payment Method: Cash on Delivery</p>
                    <table class="table-auto w-full mt-4">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">Product</th>
                            <th class="px-4 py-2">Quantity</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->facturaDetails as $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $item->descriptionF }}</td>
                                <td class="border px-4 py-2">{{ $item->quantity }}</td>
                                <td class="border px-4 py-2">${{ $item->products_totals / $item->quantity }}</td>
                                <td class="border px-4 py-2">${{ $item->products_totals }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <p class="mt-6">Total Amount: ${{ $order->total_factura }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
