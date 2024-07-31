@extends('layouts.clients')

@section('title', 'Your Orders')

@section('banner-title', 'Order History')

@section('content')
<style>
    .order-table {
        width: 100%;
        margin: 20px 0;
        border-collapse: collapse;
    }
    .order-table th, .order-table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }
    .order-table th {
        background-color: #2c3e50;
        color: white;
    }
    .order-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .order-table img {
        width: 80px;
        height: auto;
        border-radius: 5px;
    }
    .order-details {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .order-details div {
        margin-bottom: 5px;
    }
    .empty-cart {
        text-align: center;
        font-size: 18px;
        color: #7f8c8d;
    }
    .order-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    .order-card-header {
        background-color: #2c3e50;
        color: white;
        padding: 15px;
        border-radius: 8px 8px 0 0;
        font-size: 20px;
    }
    .order-card-body {
        padding: 15px;
    }
    .btn-continue {
        background-color: #2c3e50;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        text-transform: uppercase;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .btn-continue:hover {
        background-color: #34495e;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-sm-12 mb-4 mb-xl-0">
            <div class="order-card">
                <div class="order-card-body">
                    @if($carts->isEmpty())
                        <p class="empty-cart">No orders found.</p>
                    @else
                        <table class="order-table">
                            <thead>
                                <tr>
                                    <th>Receipt ID</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carts as $cart)
                                    <tr>
                                        <td>{{ $cart->RecieptId }}</td>
                                        <td>{{ $cart->quantity }}</td>
                                        <td>${{ number_format($cart->price, 2) }}</td>
                                        <td>
                                            @foreach($cart->details as $detail)
                                                <div class="order-details">
                                                    <img src="{{ asset('Image/products/' . $detail->product->productImage1) }}" alt="{{ $detail->product->productName }}">
                                                    <div>
                                                        <strong>{{ $detail->product->productName }}</strong> - {{ $detail->quantity }} - ${{ number_format($detail->totalPrice, 2) }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="#" class="btn-continue">Continue Payments</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
