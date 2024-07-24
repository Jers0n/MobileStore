@extends('layouts.template')

@section('content')

    <div class="container">
        <br>
        <h2>Admin Dashboard</h2><hr>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="card-header"><b>Products</b></div>
                            <div class="card-body">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-info">Product Index</a>
                                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Create New Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="card-header">Brands</div>
                            <div class="card-body">
                                <a href="{{ route('admin.brands.index') }}" class="btn btn-info">List of Brands</a>
                                <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">Create New Brand</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="card-header">Categories</div>
                            <div class="card-body">
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-info">List of Categories</a>
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Create New Categories</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="card-header">Features</div>
                            <div class="card-body">
                                <a href="{{ route('admin.features.index') }}" class="btn btn-info">List of Features</a>
                                <a href="{{ route('admin.features.create') }}" class="btn btn-primary">Create New Features</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="card-header">Changelogs</div>
                            <div class="card-body">
                                <a href="{{ route('admin.changelogs.index') }}" class="btn btn-primary">List of Changelogs</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-">
                        <div class="card-footer">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <div class="d-flex justify-content-between"> 
                                    <a href="{{ route('home') }}" class="btn btn-secondary">Admin Home</a>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?')">Logout</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection