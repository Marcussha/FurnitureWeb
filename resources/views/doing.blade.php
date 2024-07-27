@extends('layouts.clients')

@section('title', 'Our Products')

@section('banner-title', 'Our Product in ')

@section('content')
<h2>Products in {{ $category->categoryName }}</h2>
<div class="row">
    @foreach ($products as $product)
        <div class="col-md-3">
            <div class="product-card">
                <img class="img-fluid w-100" src="{{ asset('Image/products/' . $product->productImage1) }}" alt="No Image">
                <h5>{{ $product->productName }}</h5>
                <p>${{ $product->productPrice }}</p>
                <p>{{ $product->productDetails }}</p>
                <form action="{{ route('cart.add', ['productId' => $product->productID]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-warning">Add To Cart</button>
                 </form>
            </div>
        </div>
    @endforeach
@endsection
