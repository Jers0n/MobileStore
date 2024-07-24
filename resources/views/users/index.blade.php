@extends('layouts.template')

@section('content')

    <div class="container">
        <br>
        <h2>User Dashboard</h2><hr>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div><h3><b>Menu</b></h3></div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="card-body">
                                <a href="{{ route('shop.index') }}" class="btn btn-info">Shop</a><br>
                                <a href="{{ route('cart.index') }}" class="btn btn-warning">Cart</a><br>
                                <a href="{{ route('wishlist.list') }}" class="btn btn-secondary">Wishlist</a><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="card-header">Orders</div>
                            <div class="card-body">
                                <a href="#" class="btn btn-info">Orders</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="card-header">Profile</div>
                            <div class="card-body">
                                <a href="{{ route('profile.detail') }}" class="btn btn-primary">Profile</a><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-">
                        <div class="card-footer">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <div class="d-flex justify-content-between"> 
                                    <a href="{{ route('home') }}" class="btn btn-secondary">Welcome Page</a>
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