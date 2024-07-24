@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h1>Delete Feature</h1>
                    <hr>
                    <h3><b>Are you sure you want to delete this feature?</b></h3>
                    <div class="card-body bg-white">
                        <p><b>Feature ID:</b> {{ $feature->feature_id }}</p>
                        <p><b>Weight:</b> {{ $feature->weight }}</p>
                        <p><b>Dimensions:</b> {{ $feature->dimensions }}</p>
                        <p><b>OS:</b> {{ $feature->OS }}</p>
                        <p><b>Screensize:</b> {{ $feature->screensize }}</p>
                        <p><b>Resolution:</b> {{ $feature->resolution }}</p>
                        <p><b>CPU:</b> {{ $feature->CPU }}</p>
                        <p><b>RAM:</b> {{ $feature->RAM }}</p>
                        <p><b>Storage:</b> {{ $feature->storage }}</p>
                        <p><b>Battery:</b> {{ $feature->battery }}</p>
                        <p><b>Rear camera:</b> {{ $feature->rear_camera }}</p>
                        <p><b>Front camer:</b> {{ $feature->front_camera }}</p>
                    </div>
                </div>

                <div class="card-footer">
                    <form action="{{ route('admin.features.destroy', $feature->feature_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <!-- Normalize.css -->
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
@endsection
