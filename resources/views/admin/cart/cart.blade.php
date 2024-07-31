@extends('layouts.admin')

@section('content')
<style>
    .cart-table {
        width: 100%;
        margin: 20px 0;
        border-collapse: collapse;
    }
    .cart-table th, .cart-table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    .cart-table th {
        background-color: #191c24;
    }
    .cart-table tr:nth-child(even) {
        background-color: #191c24;
    }
    .cart-table img {
        width: 100px;
        height: auto;
    }
</style>

    <div class="row">
        <div class="col-sm-12 mb-4 mb-xl-0">
            <div class="card">
                <div class="card-body">
                    <h1>Cart Details</h1>
                    @if($carts->isEmpty())
                        <p class="empty-cart">No cart items found.</p>
                    @else
                        <table class="cart-table">
                            <thead>
                                <tr>
                                    <th>Reciept ID</th>
                                    <th>Customer</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carts as $cart)
                                    <tr>
                                        <td>{{ $cart->RecieptId }}</td>
                                        <td>{{ $cart->user->name }}</td>
                                        <td>{{ $cart->quantity }}</td>
                                        <td>${{ number_format($cart->price, 2) }}</td>
                                        <td>
                                            @foreach($cart->details as $detail)
                                                <div>
                                                    <img src="{{ asset('Image/products/' . $detail->product->productImage1) }}" alt="{{ $detail->product->productName }}">
                                                    {{ $detail->product->productName }} - {{ $detail->quantity }} - ${{ number_format($detail->totalPrice, 2) }}
                                                </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
</div>
@endsection
