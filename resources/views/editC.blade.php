@extends('layouts.app')

@section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-9 mb-4 mb-lg-0">
            <div class="card mb-3 mx-auto" style="border-radius: .5rem;">
                <div class="row g-0 justify-content-center">
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <form action="{{ url('users/update') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="id" value="{{ $data->id }}">
                              <hr class="mt-0 mb-4">
                              <d<iv class="row pt-1">
                                  <div class="col">
                                      <h6><strong>Name</strong></h6>
                                      <input type="text" name="name" class="form-control" placeholder="Enter data" value="{{ $data->name }}">
                                      @error('name')
                                          <div class="alert alert-danger" role="alert">
                                              {{ $message }}
                                          </div>
                                      @enderror
                                  </div>

                                  <div class="">
                                      <h6><strong>Email</strong></h6>
                                      <input type="text" name="email" class="form-control" placeholder="Enter data" value="{{ $data->email }}">
                                      @error('email')
                                          <div class="alert alert-danger" role="alert">
                                              {{ $message }}
                                          </div>
                                      @enderror
                                  </div>
                              </div>

                              <hr class="mt-0 mb-4">
                              <div class="row pt-1">
                                  <div class="col-6 mb-3 mx-auto d-flex justify-content-center">
                                      <button type="submit" class="btn btn-outline-primary btn-floating">Update</button>
                                      <a href="{{ url('home') }}" class="btn btn-outline-danger btn-floating">Back</a>
                                  </div>
                              </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
