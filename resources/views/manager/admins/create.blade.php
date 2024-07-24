@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Create Admin</h2>
                    <hr>

                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('manager.admins.storeNewAdmin') }}" enctype="multipart/form-data">
                            @csrf
    
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required>
                            </div>
    
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>
                            </div>
    
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
    
                            <div class="mb-3">
                                <label for="user_type" class="form-label">User Type:</label>
                                <select id="user_type" name="user_type" class="form-select" required>
                                    <option value="admin">ADM</option>
                                </select>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('manager.admins.index') }}" class="btn btn-secondary">Back to List</a>
                                <button type="submit" class="btn btn-primary">Create Admin</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
