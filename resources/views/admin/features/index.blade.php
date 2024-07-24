@extends('layouts.template')

@section('content')
    <div class="container" style="padding:10px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <div class="card-text">
                        {{-- Display success message --}}
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
                        {{-- Display the error message --}}
                        @if(session('error'))
                            <div id="errorAlert" class="container">
                                <div class="row justify-content-end">
                                    <div class="col-md-5">
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <h2 class="text-center" style="text-transform:none">List of Features</h2>
                        <hr>
                    </div>
                    <div class="card-body bg-white">
                        <div class="d-flex justify-content-between"> 
                            <div class="mb-3">
                                <a href="{{ route('admin.features.create') }}" class="btn btn-primary">Create New Feature</a>
                            </div>
                            <div>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-primary">List of Products</a>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Feature ID</th>
                                    <th>Product Name</th>
                                    <th>Slug Name</th>
                                    <th>Brand Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($features as $feature)
                                    <tr>
                                        <td>{{ $feature->feature_id }}</td>
                                        <td>
                                            @foreach ($feature->products as $product)
                                                {{ $product->name }}<br>
                                            @endforeach
                                            @if ($feature->products->isEmpty())
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @foreach ($feature->products as $product)
                                                {{ $product->slug }}<br>
                                            @endforeach
                                            @if ($feature->products->isEmpty())
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @foreach ($feature->products as $product)
                                                {{ $product->brand->name }}<br>
                                            @endforeach
                                            @if ($feature->products->isEmpty())
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <a href="{{ route('admin.features.detail', $feature->feature_id) }}" class="btn btn-info w-100">Details</a>
                                                </div>
                                                <div class="col-sm-4">
                                                    <a href="{{ route('admin.features.edit', $feature->feature_id) }}" class="btn btn-primary w-100">Edit</a>
                                                </div>
                                                <div class="col-sm-4">
                                                    <a href="{{ route('admin.features.delete',$feature->feature_id) }}" class="btn btn-danger w-100">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Go back to the Admin Dashboard</a>
                        {{ $features->withQueryString()->links("pagination.default") }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Hide duccess message after 3 seconds
        setTimeout(function() {
            $('#successAlert').fadeOut('slow');
        }, 3000); // Time delay here is (in milliseconds)
        // Hide error message after 10 seconds
        setTimeout(function() {
            $('#errorAlert').fadeOut('slow');
        }, 10000); // Time delay here is (in milliseconds)
    </script>
@endsection

@section('styles')
    <!-- Normalize.css -->
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
@endsection
