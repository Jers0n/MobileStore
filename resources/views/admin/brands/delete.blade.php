@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h1>Delete</h3>
                    <br>
                    <h3><b>Are you sure you want to delete this brand?</b></h3>

                    <div class="card-body bg-white">
                        <p><strong>Brand Name:</strong> {{ $brand->name }}</p>
                        <p><strong>Brand Slug:</strong> {{ $brand->slug }}</p>
                        <div class="mb-4">
                            <b><p>Image:</p></b><img src="{{ asset('assets/images/uploads/brands/'.$brand->image) }}" width="100px" height="100px" alt="Image">
                        </div> 
                    </div>
                </div>
                <div class="card-footer">
                    <form action="{{ route('admin.brands.destroy', $brand->brand_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
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
