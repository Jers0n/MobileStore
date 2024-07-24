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
                        <h2 class="text-center" style="text-transform:none">List of Changelogs</h2><br>
                    </div>
                    <div class="card-body bg-white">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Changelog ID</th>
                                    <th>Date Created</th>
                                    <th>Date Last Modified</th>
                                    <th>Message</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($changelogs as $changelog)
                                    <tr>
                                        <td>{{ $changelog->changelog_id }}</td>
                                        <td>{{ $changelog->date_created }}</td>
                                        <td>{{ $changelog->date_last_modified }}</td>
                                        <td style="max-width: 300px; overflow: hidden; text-overflow: ellipsis;">{{ $changelog->message }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="{{ route('admin.changelogs.detail', $changelog->changelog_id) }}" class="btn btn-info mx-2 w-100">Details</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{ route('admin.changelogs.delete',$changelog->changelog_id) }}" class="btn btn-danger w-100">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Go back to the Admin Dashboard</a>
                        {{ $changelogs->withQueryString()->links("pagination.default") }}
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

