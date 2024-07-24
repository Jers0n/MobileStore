@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Create Product</h2><hr>
                    <div class="card-body bg-white">
                        <form action="{{ route('admin.products.storeNewProduct') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus >
                                @error('name')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="product-slug-name" value="{{ old('slug') }}" required>
                                @error('slug')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="product_model" class="form-label">Product Model</label>
                                <input type="text" class="form-control" id="product_model" name="product_model" value="{{ old('product_model') }}" required>
                                @error('product_model')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="manufacturer" class="form-label">Manufacturer</label>
                                <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ old('manufacturer') }}" required>
                                @error('manufacturer')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="short_description" class="control-label">Short Description:</label>
                                <textarea class="form-control" id="short_description" name="short_description" rows="4"  required>N/A</textarea>
                                @error('short_description')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="control-label">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="6" required>N/A</textarea>
                                @error('description')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="regular_price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="regular_price" name="regular_price" value="{{ old('regular_price') }}"required>
                                @error('regular_price')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="sale_price" class="form-label">Sale Price:</label>
                                <input type="text" class="form-control" id="sale_price" name="sale_price" value="200">
                                @error('sale_price')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                                <p><b>NOTE:</b> The sale price should be equivalent to the actual price to ensure that the price is displayed correctly.</p> 
                            </div>
                            <div class="mb-3">
                                <label for="SKU" class="form-label">SKU</label>
                                <input type="text" class="form-control" id="SKU" name="SKU" value="{{ $generatedSku }}" required>
                                @error('SKU')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                                @error('image')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="images" class="form-label">Images</label>
                                <input type="file" class="form-control" id="images" name="images[]" multiple required>
                                @error('images')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="stock_status" class="control-label">Stock Status:</label>
                                <select class="form-control" id="stock_status" name="stock_status">
                                    <option value="instock">In Stock</option>
                                    <option value="outofstock">Out of Stock</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="stock_on_hand" class="form-label">Stock on Hand</label>
                                <input type="text" class="form-control" id="stock_on_hand" name="stock_on_hand" value="10" required>
                                @error('stock_on_hand')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="featured" class="control-label">Featured:</label>
                                <select class="form-control" id="featured" name="featured">
                                    <option value="1">True</option>
                                    <option value="0" selected>False</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="features" class="control-label">FeatureID:</label>
                                <select name="features" id="features" class="form-control select-sm" required>
                                    <option value="">Select feature ID...</option>
                                    @foreach($features as $feature)
                                        <option value="{{ $feature->feature_id }}">{{ $feature->feature_id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="brands" class="control-label">BrandID:</label>
                                <select name="brands" id="brands" class="form-control select-sm" required>
                                    <option value="">Select brand ...</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->brand_id }}">{{ $brand->brand_id }} - {{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="categories" class="control-label">CategoryID:</label>
                                <select name="categories" id="categories" class="form-control select-sm" required>
                                    <option value="">Select category ...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->category_id }} - {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back to Products</a>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
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
