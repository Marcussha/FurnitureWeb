@extends('layouts.clients')

@section('title', 'What we do')

@section('banner-title', 'All Products')

@section('content')
   <div class="row">
      @foreach ($data as $product)
      <div class="col-md-3">
            <div class="full decorate_blog">
               <img class="img-fluid w-100" src="{{ asset('Image/products/' . $product->productImage1) }}" alt="No Image">
               <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                  <h5>{{ $product->productName }}</h5>
                  <div class="d-flex justify-content-center">
                        <h6>${{ $product->productPrice }}</h6>
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                  </div>
               </div>
               <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                  <p>{{ $product->productDetails }}</p>
               </div>
               <form action="{{ route('cart.add', ['productId' => $product->productID]) }}" method="POST" class="add-to-cart-form">
                  @csrf
                  <button type="submit" class="decorate_blog_bt">Add To Cart</button>
               </form>
            </div>
      </div>
      @endforeach
   </div>

   <!-- Popup Modal -->
   <div id="cart-popup" class="cart-popup">
      <div class="cart-popup-content">
         <p>Do you want to check out or continue shopping?</p>
         <button id="checkout-btn" class="btn btn-primary">Check Out</button>
         <button id="continue-btn" class="btn btn-secondary">Continue Shopping</button>
      </div>
   </div>

   <style>
      .cart-popup {
         display: none; /* Hidden by default */
         position: fixed; /* Stay in place */
         z-index: 1000; /* Sit on top */
         left: 0;
         top: 0;
         width: 100%; /* Full width */
         height: 100%; /* Full height */
         overflow: auto; /* Enable scroll if needed */
         background-color: rgb(0,0,0); /* Fallback color */
         background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      }

      .cart-popup-content {
         background-color: #fefefe;
         margin: 15% auto; /* 15% from the top and centered */
         padding: 20px;
         border: 1px solid #888;
         width: 80%; /* Could be more or less, depending on screen size */
         text-align: center;
      }

      .cart-popup button {
         margin: 10px;
      }
   </style>

   <script>
      document.addEventListener('DOMContentLoaded', function() {
         const forms = document.querySelectorAll('.add-to-cart-form');
         const popup = document.getElementById('cart-popup');
         const checkoutBtn = document.getElementById('checkout-btn');
         const continueBtn = document.getElementById('continue-btn');

         forms.forEach(form => {
            form.addEventListener('submit', function(event) {
               event.preventDefault();
               const formData = new FormData(form);
               fetch(form.action, {
                  method: form.method,
                  body: formData,
                  headers: {
                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
                  }
               }).then(response => {
                  if (response.ok) {
                     popup.style.display = 'block';
                  } else {
                     alert('Failed to add to cart.');
                  }
               }).catch(error => {
                  console.error('Error:', error);
                  alert('Failed to add to cart.');
               });
            });
         });

         checkoutBtn.addEventListener('click', function() {
            window.location.href = '{{ route("cart.view") }}';
         });

         continueBtn.addEventListener('click', function() {
            popup.style.display = 'none';
         });
      });
   </script>
@endsection
