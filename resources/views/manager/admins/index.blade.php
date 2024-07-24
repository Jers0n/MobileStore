@extends('layouts.template')

@section('content')
<div class="container">
    <div class="card mb-8">
        <div class="card-header">
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

            <h2 class="text-center">List of Admins</h2>
            <div class="btn-group">
                <a href="{{ route('manager.admins.create') }}" class="btn btn-primary">Create New Admin</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <thead class="bg-info">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                        <tr>
                            <td>{{ $admin->user_id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>Admin</td> 
                            <td>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="{{ route('manager.admins.view', $admin->user_id) }}" class="btn btn-sm btn-info w-100">View</a>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="{{ route('manager.admins.edit', $admin->user_id) }}" class="btn btn-sm btn-warning w-100">Edit</a>
                                    </div>
                                    <div class="col-sm-4">
                                        <form id="deleteAdminForm_{{ $admin->user_id }}" action="{{ route('manager.admins.delete_confirmation', $admin->user_id) }}" method="GET">
                                            {{-- <button type="submit" class="btn btn-sm btn-danger w-100">Delete</button> --}}
                                            <button onclick="deleteAdmin('{{ $admin->user_id }})" class="btn btn-sm btn-danger w-100">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $admins->links() }} <!-- Pagination links -->
        </div>
</div>

<script>
    // Function to hide the success message after 5 seconds
    setTimeout(function() {
        $('#successAlert').fadeOut('slow');
    }, 3000); // Adjust the time delay here (in milliseconds)
</script>
@endsection



