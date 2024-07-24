@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @auth
                    @if(Auth::check() && Auth::user()->utype === 'ADM')
                        <div class="card-header">
                            <h2>Welcome, {{ Auth::user()->name }} !</h2>
                            <hr>

                            <div class="card-body bg-white">
                                <p>What would you like to do?</p>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <p>Manage Products: <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Products</a></p>
                                        </div>
                                        <div class="mb-3">
                                            <p>Manage Brands: <a href="{{ route('admin.brands.index') }}" class="btn btn-primary">Brands</a></p>
                                        </div>
                                        <div class="mb-3">
                                            <p>Manage Categories: <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Categories</a></p>
                                        </div>
                                        <div class="mb-3">
                                            <p>Manage Features: <a href="{{ route('admin.features.index') }}" class="btn btn-primary">Features</a></p>
                                        </div>
                                        <div class="mb-3">
                                            <p>View Changelogs: <a href="{{ route('admin.changelogs.index') }}" class="btn btn-primary">Changelogs</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Go to the Admin Dashboard</a>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?')">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif ((Auth::check() && Auth::user()->utype === 'MGR'))
                    <div class="card-header">
                        <h2>Welcome, {{ Auth::user()->name }} !</h2>
                        <hr>

                        <div class="card-body bg-white">
                            <p>What would you like to do?</p>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <p>Manage Admins: <a href="{{ route('manager.admins.index') }}" class="btn btn-primary">Admins</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('manager.index') }}" class="btn btn-secondary">Go to the Manager Dashboard</a>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?')">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else 
                        <h2>Welcome, {{ Auth::user()->name }} !</h2>

                        <hr>

                        <div class="card-body bg-white">
                            <p>What would you like to do?</p>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <p>Shop Now! <a href="{{ route('shop.index') }}" class="btn btn-primary">Shop</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Go to the User Dashboard</a>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?')">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endauth
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
