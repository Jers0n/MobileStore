@extends('layouts.template')

@section('content')
    <div class="container">
        @if(session('success'))
            <div id="successAlert" class="container">
                <div class="row justify-content-end">
                    <div class="col-md-3">
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <h2 class="text-center">List of Products</h2>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <h5>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Create New Product</a><br><br>
                </h5>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4 border-success mb-3">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-12">
                                        <div class="card-header bg-primary text-white">
                                            <p class="card-text">
                                                <h5 class="card-title left">
                                                    {{ $product->product_id }} - {{ $product->name }}
                                                </h5>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-footer ">
                                            <p class="card-text"><b>Model:</b> {{ $product->product_model }}</p>
                                            <b>Manufacturer:</b> {{ $product->manufacturer }}</p>
                                            <p class="card-text"><b>Price:</b> {{ $product->regular_price }}</p>
                                            <p class="card-text"><b>Stock on hand:</b> {{ $product->stock_on_hand }}</p>
                                            <p><b>Image:</b></p><img src="{{ asset('assets/images/uploads/products/'.$product->image) }}" width="100px" height="100px" alt="{{ $product->i }}"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-footer">
                                            <a href="{{ route('admin.products.detail', $product->slug) }}" class="btn btn-info w-35">Show Details</a>
                                            <a href="{{ route('admin.products.edit', $product->product_id) }}" class="btn btn-warning w-35">Edit</a>
                                            <form action="{{ route('admin.products.delete', $product->product_id) }}" method="GET" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger 2-35">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $products->withQueryString()->links("pagination.default") }}
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
