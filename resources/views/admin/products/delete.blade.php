@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Delete Product</h2><br>
                    <h3>Do you want to delete this product?</h3>
                </div>
                <div class="card-body">
                    <p><b>Product Name:</b>{{ $product->name }}</p>
                    <p><b>Slug:</b> {{ $product->slug }}</p>
                    <p><b>Short Description:</b> {{ $product->short_description }}</p>
                    <p><b>Description:</b> {{ $product->description }}</p>
                    <p><b>Price:</b> {{ $product->regular_price }}</p>
                    <p><b>Sale Price:</b> {{ $product->sale_price ?: 'N/A' }}</p>
                    <p><b>SKU:</b> {{ $product->SKU }}</p>
                    <p><b>Quantity:</b> {{ $product->quantity }}</p>
                    <p><b>Image:</b> <img src="{{ asset('assets/images/uploads/products/'.$product->image) }}" width="100px" height="100px" alt="Image"></p>
                    <span>{{ $product->image }}</span>
                    <p><b>Images:</b> 
                        @if (!empty($product->images))
                            @php
                                $imageArray = unserialize($product->images);
                                if (!is_array($imageArray)) {
                                    // Handle the case where unserialization fails or the result is not an array
                                    \Log::error('Invalid or empty image array for product ID: ' . $product->id);
                                    $imageArray = []; // Set $imageArray to an empty array to avoid errors
                                }
                            @endphp

                            @if (!empty($imageArray))
                                <div style="display: flex; flex-wrap: wrap;">
                                    @foreach ($imageArray as $img)
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
                            @else
                                <p>No images available</p>
                            @endif
                        @else
                            <p>No images available</p>
                        @endif

                    </p>
                    <p><b>Stock Status:</b> {{ $product->stock_status }}</p>
                    <p><b>
                        @if($product->featured == 0)
                            Featured:</b> False
                        @else 
                            Featured:</b> True
                        @endif
                    </p>
                    <p><b>FeatureID:</b> {{ $product->feature_id }}</p> <a></a>
                    {{-- <a href="{{ route('admin.features.edit', $product->feature_id) }}">Edit Feature</a> --}}
                    <p><b>BrandID:</b> {{ $product->brand_id }}</p>
                    <p><b>CategoryID:</b> {{ $product->category_id }}</p>
                </div>
                <div class="card-footer">
                    <form action="{{ route('admin.products.destroy', $product->product_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
