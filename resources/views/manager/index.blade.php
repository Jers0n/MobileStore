@extends('layouts.template')
@section('content')
<div class="container">
    <br>
    <h2>Manager Dashboard</h2><hr>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="card-header">
                            <strong>Admins</strong>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('manager.admins.index') }}" class="btn btn-info">List of Admins</a>
                            <a href="{{ route('manager.admins.create') }}" class="btn btn-primary">Create New Admin User</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-footer">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?')">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection