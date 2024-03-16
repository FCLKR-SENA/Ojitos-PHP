<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Checkout
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="T1">Checkout</h1>
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="payment_method" class="block text-gray-700 font-bold mb-2">Payment Method:</label>
                            <select name="payment_method" id="payment_method" class="form-select rounded-md shadow-sm mt-1 block w-full" required>
                                <option value="">Select Payment Method</option>
                                <option value="cash">Cash on Delivery</option>
                                <option value="card">Credit/Debit Card</option>
                            </select>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600">Place Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
