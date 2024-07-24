@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Product</h2><hr>
                    <div class="card-body bg-white">
                        <form action="{{ route('admin.products.update', $product->product_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required autofocus>
                                @error('name')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{ $product->slug }}" required>
                                @error('slug')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="product_model" class="form-label">Product Model</label>
                                <input type="text" class="form-control" id="product_model" name="product_model" value="{{ $product->product_model }}" required>
                                @error('product_model')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="manufacturer" class="form-label">Manufacturer</label>
                                <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ $product->manufacturer }}" required>
                                @error('manufacturer')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="short_description" class="control-label">Short Description:</label>
                                <textarea class="form-control" id="short_description" name="short_description" rows="4">{{ $product->short_description }}</textarea>
                                @error('short_description')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="control-label">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="6">{{ $product->description }}</textarea>
                                @error('description')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="regular_price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="regular_price" name="regular_price" value="{{ $product->regular_price }}" required>
                                @error('regular_price')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="sale_price" class="form-label">Sale Price:</label>
                                <input type="text" class="form-control" id="sale_price" name="sale_price" value="{{ $product->sale_price ?? '0.00' }}">
                                @error('sale_price')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="SKU" class="form-label">SKU</label>
                                <input type="text" class="form-control" id="SKU" name="SKU" value="{{ $product->SKU }}" required>
                                @error('SKU')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="stock_on_hand" class="form-label">Stock on Hand</label>
                                <input type="text" class="form-control" id="stock_on_hand" name="stock_on_hand" value="{{ $product->stock_on_hand }}" required>
                                @error('stock_on_hand')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="control-label">Current Image: {{ $product->image }}</label>
                                <div>
                                    <img src="{{ asset('assets/images/uploads/products/'.$product->image) }}" width="100px" height="100px" alt="Image">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">New Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @error('image')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="images" class="form-label">Images</label>
                                <input type="file" class="form-control" id="images" name="images[]" multiple>
                                @error('images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if (!empty($product->images))
                                <div style="display: flex; flex-wrap: wrap;">
                                    @foreach (unserialize($product->images) as $img)
                                        <div style="padding: 10px;">
                                            @php
                                                // Extract the filename without the extension
                                                $imageNameWithExtension = pathinfo($img, PATHINFO_FILENAME);
                                                $imageName = substr($imageNameWithExtension, 0, strrpos($imageNameWithExtension, '_'));
                                            @endphp
                                            <img src="/assets/images/uploads/products/{{ $img }}" class="img-responsive" style="max-height: 100px; max-width: 100px; vertical-align: middle;" alt="{{ $imageName }}">
                                            <p style="margin-top: 5px;">{{ $imageName }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="stock_status" class="control-label">Stock Status:</label>
                                <select class="form-control" id="stock_status" name="stock_status">
                                    <option value="instock" {{ $product->stock_status == 'instock' ? 'selected' : '' }}>In Stock</option>
                                    <option value="outofstock" {{ $product->stock_status == 'outofstock' ? 'selected' : '' }}>Out of Stock</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="featured" class="control-label">Featured:</label>
                                <select class="form-control" id="featured" name="featured">
                                    <option value=1 {{ $product->featured == 1 ? 'selected' : '' }}>True</option>
                                    <option value=0 {{ $product->featured == 0 ? 'selected' : '' }}>False</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="control-label">CategoryID:</label>
                                <select name="category_id" id="categories" class="form-control select-sm">
                                    <option value="">Select category ...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->category_id }}" {{ $category->category_id == $product->category_id ? 'selected' : '' }}>{{ $category->category_id }} - {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="brand_id" class="control-label">BrandID:</label>
                                <select name="brand_id" id="brands" class="form-control select-sm">
                                    <option value="">Select brand ...</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->brand_id }}" {{ $brand->brand_id == $product->brand_id ? 'selected' : '' }}>{{ $brand->brand_id }} - {{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="feature_id" class="control-label">FeatureID:</label>
                                <select name="feature_id" id="features" class="form-control select-sm">
                                    <option value="">Select feature ...</option>
                                    @foreach($features as $feature)
                                        <option value="{{ $feature->feature_id }}" {{ $feature->feature_id == $product->feature_id ? 'selected' : '' }}>{{ $feature->feature_id }} </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back to Products</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Function to hide the success message after 5 seconds
    setTimeout(function() {
        $('#successAlert').fadeOut('slow');
    }, 3000); // Adjust the time delay here (in milliseconds)
</script>
@endsection
