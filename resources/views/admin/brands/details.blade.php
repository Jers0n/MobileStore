@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Brand Details</h1>
                    <hr>

                    <div class="card-body bg-white">
                        <div class="d-flex justify-content-end align-items-center mb-4">
                            <p class="mb-0 mr-3"><b>Number of Products:</b> {{ $brand->products_count }}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="mb-3"><b>Brand Name:</b> {{ $brand->name }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="mb-3"><b>Slug:</b> {{ $brand->slug }}</p>
                        </div>
                        <div class="mb-4">
                            <b><p>Image:</p></b><img src="{{ asset('assets/images/uploads/brands/'.$brand->image) }}" width="100px" height="100px" alt="Image">
                        </div> 
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Back to Brands</a>
                    <a href="{{ route('admin.brands.edit', $brand->brand_id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <!-- Normalize.css -->
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
@endsection
