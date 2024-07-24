@php
    $updatedValues = session('updatedValues');
@endphp

@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4>Delete Changelog</h4>
                    <p>Are you sure you want to delete this changelog?</p>

                </div>
                <div class="card-body">
                    <p><strong>Date Created:</strong> {{ $changelog->date_created }}</p>
                    <p><strong>Date Last Modified:</strong> {{ $changelog->date_last_modified }}</p>
                    <p><strong>Message:</strong> {{ $changelog->message }}</p>
                    
                    <div class="card-footer">
                        <form action="{{ route('admin.changelogs.destroy', $changelog) }}" method="POST">
                            @csrf
                            @method('DELETE')

                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.changelogs.index') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
