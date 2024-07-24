@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Feature Details</h2>
                    <hr>
                    <div class="card-body bg-white">
                        <div class="d-flex justify-content-end align-items-center mb-4">
                            <p class="mb-0 mr-3"><b>Number of Products:</b> {{ $feature->products_count }}</p>
                        </div>
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
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">Back to Categories</a>
                    <a href="{{ route('admin.features.edit', $feature->feature_id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
