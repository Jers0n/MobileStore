@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Edit Admin</h2>
                </div>
                <div>
                    <form method="POST" action="{{ route('manager.admins.update', $admin->user_id) }}">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" id="name" name="name" value="{{ $admin->name }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" id="email" name="email" value="{{ $admin->email }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <input type="checkbox" id="edit_password_checkbox" class="form-check-input">
                                <label for="edit_password_checkbox" class="form-check-label">Do you want to edit the password?</label>
                            </div>
                            
                            <div class="mb-3" id="password_field" style="display: none;">
                                <label for="password" class="form-label">New Password:</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="utype" class="form-label">User Type:</label>
                                <select id="utype" name="utype" class="form-select" required>
                                    <option value="ADM" {{ $admin->utype == 'ADM' ? 'selected' : '' }}>ADM</option>
                                </select>
                            </div>
                        <div class="card-footer d-flex justify-content-between">
                            
                            <a href="{{ route('manager.admins.index') }}" class="btn btn-secondary">Back to List</a>
                            <button type="submit" class="btn btn-primary">Update Admin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("edit_password_checkbox").addEventListener("change", function() {
        var passwordField = document.getElementById("password_field");
        if (this.checked) {
            passwordField.style.display = "block";
        } else {
            passwordField.style.display = "none";
        }
    });
</script>
@endsection
