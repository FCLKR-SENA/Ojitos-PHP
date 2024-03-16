<style>
    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 2%;
    }

    th, td {
        border: 1px solid #000;
        padding: 8px;
        text-align: center;
        color: #ffffff;
        background-color: #062c33;
    }

    th {
        background-color: #644494;
        font-weight: bold;
        color: #ffffff;
    }

    .remove-button {
        background-color: #ff4d4d;
        color: #ffffff;
        padding: 5px 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .remove-button:hover {
        background-color: #ff2222;
    }

    .checkout-button {
        background-color: #4caf50;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }

    .checkout-button:hover {
        background-color: #45a049;
    }
</style>

@extends('layouts.cart-layout')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="T1">Shopping Cart</h2>
                    @if(session('cart'))
                        <table>
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(session('cart') as $id => $details)
                                <tr>
                                    <td>{{ $details['product_name'] }}</td>
                                    <td>
                                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" data-id="{{ $id }}" style="background-color: #ffffff; color: #000000;" />
                                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}">Update</button>
                                    </td>
                                    <td>${{ $details['product_price'] }}</td>
                                    <td>${{ $details['product_price'] * $details['quantity'] }}</td>
                                    <td>
                                        <button class="remove-button remove-from-cart" data-id="{{ $id }}">Remove</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    <br>
                        <a href="{{ route('checkout.form') }}" class="checkout-button">Checkout</a>
                    @else
                        <p>Your cart is empty.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.update-cart').on('click', function (e) {
                e.preventDefault();
                var ele = $(this);
                var quantity = ele.closest('tr').find('.quantity').val();
                $.ajax({
                    url: '{{ route('cart.update') }}',
                    method: "PATCH",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id"),
                        quantity: quantity
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            });

            $('.remove-from-cart').on('click', function (e) {
                e.preventDefault();
                var ele = $(this);
                if (confirm("Are you sure you want to remove this item?")) {
                    $.ajax({
                        url: '{{ route('cart.remove') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.attr("data-id")
                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });
        });
    </script>
@endsection
