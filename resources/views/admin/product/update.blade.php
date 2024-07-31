@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-sm-12 mb-4 mb-xl-0">
        <div class="card">
            <div class="card-body">
                <h2>Update</h2>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <form method="post" action="{{ url('admin/product/update') }}" enctype="multipart/form-data">
                    @csrf 
                    <div class="md-3">
                        <label class="form-label" for="id">ID</label>
                        <input type="text" name="id" class="form-control" placeholder="Enter data" value="{{ $data->productID }}" readonly>
                        @error('id')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="md-3">
                        <label class="form-label" for="name">Product name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter data" value="{{ $data->productName }}">
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="md-3">
                        <label class="form-label" for="price">Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Enter data" value="{{ $data->productPrice }}">
                        @error('price')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="md-3">
                        <label class="form-label" for="image">Current Image</label>
                        <br>
                        <img src="{{ asset('Image/products/' . $data->productImage1) }}" alt="No Image" height="100" width="100">
                        <br>
                        <label class="form-label" for="image">Change Image</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="md-3">
                        <label class="form-label" for="detail">Detail</label>
                        <textarea name="detail" rows="5" placeholder="Enter data" class="form-control">{{ $data->productDetails }}</textarea>
                        @error('detail')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="md-3">
                        <label class="form-label" for="trademark">Trademark</label>
                        <select name="trademark" class="form-control">
                            @foreach ($trademark as $tr)
                                <option value="{{ $tr->trademarkId }}" {{ $tr->trademarkId == $data->trademarkId ? 'selected' : '' }}>{{ $tr->trademarkName }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="md-3">
                        <label class="form-label" for="category">Category</label>
                        <select name="category" class="form-control">
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->categoryID }}" {{ $cat->categoryID == $data->categoryID ? 'selected' : '' }}>{{ $cat->categoryName }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('admin/product') }}" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
