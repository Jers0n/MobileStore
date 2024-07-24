@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Delete</h3>
                    <hr>
                    <h3><b>Are you sure you want to delete this category?</b></h3>
                    <div class="card-body bg-white">
                        <p><strong>Category Name:</strong> {{ $category->name }}</p>
                        <p><strong>Category Slug:</strong> {{ $category->slug }}</p>
                    </div>
                </div>

                <div class="card-footer">
                    <form action="{{ route('admin.categories.destroy', $category->category_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
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
