<!-- edit.blade.php -->

@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Feature</h2><hr>

                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('admin.features.update', $feature->feature_id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="weight">Weight</label>
                                <input id="weight" type="text" class="form-control" name="weight" value="{{ $feature->weight }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="dimensions">Dimensions</label>
                                <input id="dimensions" type="text" class="form-control" name="dimensions" value="{{ $feature->dimensions }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="OS">OS</label>
                                <input id="OS" type="text" class="form-control" name="OS" value="{{ $feature->OS }}" required>
                            </div><div class="form-group mb-3">
                                <label for="screensize">Screensize</label>
                                <input id="screensize" type="text" class="form-control" name="screensize" value="{{ $feature->screensize }}" required>
                            </div><div class="form-group mb-3">
                                <label for="resolution">Resolution</label>
                                <input id="resolution" type="text" class="form-control" name="resolution" value="{{ $feature->resolution }}" required>
                            </div><div class="form-group mb-3">
                                <label for="cpu">CPU</label>
                                <input id="cpu" type="text" class="form-control" name="cpu" value="{{ $feature->CPU }}" required>
                            </div><div class="form-group mb-3">
                                <label for="ram">RAM</label>
                                <input id="ram" type="text" class="form-control" name="ram" value="{{ $feature->RAM }}" required>
                            </div><div class="form-group mb-3">
                                <label for="storage">Storage</label>
                                <input id="storage" type="text" class="form-control" name="storage" value="{{ $feature->storage }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="battery">Battery</label>
                                <input id="battery" type="text" class="form-control" name="battery" value="{{ $feature->battery }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="rear_camera">Rear Camera</label>
                                <input id="rear_camera" type="text" class="form-control" name="rear_camera" value="{{ $feature->rear_camera }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="front_camera">Front Camera</label>
                                <input id="front_camera" type="text" class="form-control" name="front_camera" value="{{ $feature->front_camera }}" required>
                            </div>
                            
                            <br>
                            <div class="card-footer form-group">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Save</button>
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
