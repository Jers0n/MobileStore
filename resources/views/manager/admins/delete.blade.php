@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-12">
                <div class="col-md-12">
                    <div class="card-header">
                        <h2>Delete Admin</h2>
                        <hr>
                        <h3><b>Are you sure you want to delete this admin user?</b></h3>

                        <div class="card-body bg-white">
                            <p>Name: {{ $admin->name }}</p>
                            <p>Email:{{ $admin->email }}</p>
                        </div>
                    </div>

                    <div class="card-footer">
                        <form action="{{ route('manager.admins.delete', $admin->user_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('manager.admins.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
