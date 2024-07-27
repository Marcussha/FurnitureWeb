@extends('layouts.clients')

@section('title', 'Your carts')

@section('banner-title', 'Your carts')

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
      background-color: #f4f4f4;
   }
   .cart-table tr:nth-child(even) {
      background-color: #f9f9f9;
   }
   .cart-table img {
      width: 100px;
      height: auto;
   }
   .cart-buttons {
      display: flex;
      justify-content: center;
      margin: 20px 0;
   }
   .btn-checkout, .btn-remove, .btn-clear {
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      color: white;
   }
   .btn-checkout {
      background-color: #007bff;
   }
   .btn-checkout:hover {
      background-color: #0056b3;
   }
   .btn-remove, .btn-clear {
      background-color: #dc3545;
      margin-right: 10px;
   }
   .btn-remove:hover, .btn-clear:hover {
      background-color: #c82333;
   }
   .empty-cart {
      text-align: center;
      padding: 20px;
      font-size: 18px;
      color: #666;
   }
   .cart-total {
      font-size: 18px;
      font-weight: bold;
      text-align: right;
      margin: 20px 0;
   }
   .icon-minus {
      width: 20px;
      height: 20px;
      fill: #dc3545;
   }
</style>

<div class="row">
   <div class="container">
      @if(Session::has('cart'))
         @php
            $total = 0;
         @endphp
         <table class="cart-table">
            <thead>
               <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody id="cartBody">
               @foreach(Session::get('cart') as $productId => $item)
                  @php
                     $itemTotal = $item['price'] * $item['quantity'];
                     $total += $itemTotal;
                  @endphp
                  <tr data-product-id="{{ $productId }}">
                     <td>
                        <img src="{{ asset('Image/products/' . $item['image']) }}" alt="{{ $item['name'] }}">
                        {{ $item['name'] }}
                     </td>
                     <td>${{ number_format($item['price'], 2) }}</td>
                     <td>{{ $item['quantity'] }}</td>
                     <td>${{ number_format($itemTotal, 2) }}</td>
                     <td>
                        <form action="{{ route('cart.remove', ['productId' => $productId]) }}" method="POST" style="display:inline;">
                           @csrf
                           <svg class="icon-minus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="cursor: pointer;" onclick="this.closest('form').submit();">
                              <rect x="2" y="10" width="20" height="2" />
                           </svg>
                        </form>
                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>
         <div class="cart-total" id="cartTotal">
            <span>Total Amount:</span> ${{ number_format($total, 2) }}
         </div>
         <div class="cart-buttons">
            <form action="{{ route('cart.clear') }}" method="POST" style="display:inline;">
               @csrf
               <button type="submit" class="btn-clear">Clear Cart</button>
            </form>
            @if(auth()->check())
               <form action="{{ route('cart.checkout') }}" method="POST" style="display:inline;">
                  @csrf
                  <input type="hidden" name="customer_id" value="{{ auth()->user()->id }}">
                  <input type="hidden" name="staff_id" value="1">
                  <button type="submit" class="btn-checkout">Checkout</button>
               </form>
            @else
               <p>Please log in to proceed with checkout.</p>
            @endif
         </div>
      @else
         <p class="empty-cart">Your cart is empty.</p>
      @endif
   </div>
</div>
@endsection
