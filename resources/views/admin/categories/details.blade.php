@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Category</h2>
                    <hr>
                    <div class="card-body bg-white">
                        <div class="d-flex justify-content-end align-items-center mb-4">
                            <p class="mb-0 mr-3"><b>Number of Products:</b> {{ $category->products_count }}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="mb-3"><b>Category Name:</b> {{ $category->name }}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="mb-3"><b>Slug:</b> {{ $category->slug }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back to Categories</a>
                    <a href="{{ route('admin.categories.edit', $category->category_id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
