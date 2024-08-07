@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12 mb-4 mb-xl-0">
        <div class="card">
            <div class="card-body">
                <h4>
                    Edit Producer
                    <a href="{{ url('admin/trademark') }}" class="btn btn-primary text-white float-right">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <form action="{{ url('admin/trademark/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="id">ID</label>
                            <input type="text" id="id" name="id" class="form-control" value="{{ old('id', $data->trademarkId) }}" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name', $data->trademarkName) }}">
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary float-end">Update</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
