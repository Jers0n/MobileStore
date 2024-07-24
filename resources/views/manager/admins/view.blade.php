@extends('layouts.template')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h2>Admin Details</h2>
                <hr>

                <div class="card-body bg-white">
                    <p>Name: {{ $admin->name }}</p>
                    <p>Email: {{ $admin->email }}</p>
                    <p>User Role: Admin</p>
                </div>
            </div>
            
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('manager.admins.index') }}" class="btn btn-secondary">Go Back</a>
                <a href="{{ route('manager.admins.edit', $admin->user_id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
