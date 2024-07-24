@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Create Feature</h2>
                    <hr>
                    <div class="card-body bg-white">
                        <form action="{{ route('admin.features.storeNewFeature') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="weight" class="form-label">Weight</label>
                                <input type="text" class="form-control" id="weight" name="weight" value="{{ old('weight') }}" required>
                                @error('weight')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="dimensions" class="form-label">Dimensions</label>
                                <input type="text" class="form-control" id="dimensions" name="dimensions" value="{{ old('dimensions') }}" required>
                                @error('dimensions')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="OS" class="form-label">OS</label>
                                <input type="text" class="form-control" id="OS" name="OS" value="{{ old('OS') }}" required>
                                @error('OS')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="screensize" class="form-label">Screensize</label>
                                <input type="text" class="form-control" id="screensize" name="screensize" value="{{ old('screensize') }}" required>
                                @error('screensize')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="resolution" class="form-label">Resolution</label>
                                <input type="text" class="form-control" id="resolution" name="resolution" value="{{ old('resolution') }}" required>
                                @error('resolution')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cpu" class="form-label">CPU</label>
                                <input type="text" class="form-control" id="cpu" name="cpu" value="{{ old('cpu') }}" required>
                                @error('cpu')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="ram" class="form-label">RAM</label>
                                <input type="text" class="form-control" id="ram" name="ram" value="{{ old('ram') }}" required>
                                @error('ram')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="storage" class="form-label">Storage</label>
                                <input type="text" class="form-control" id="storage" name="storage" value="{{ old('storage') }}" required>
                                @error('storage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="battery" class="form-label">Battery</label>
                                <input type="text" class="form-control" id="battery" name="battery" value="{{ old('battery') }}" required>
                                @error('battery')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="rear_camera" class="form-label">Rear camera</label>
                                <input type="text" class="form-control" id="rear_camera" name="rear_camera" value="{{ old('rear_camera') }}" required>
                                @error('rear_camera')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="front_camera" class="form-label">Front camera</label>
                                <input type="text" class="form-control" id="front_camera" name="front_camera" value="{{ old('front_camera') }}" required>
                                @error('front_camera')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="card-footer mb-3 d-flex justify-content-between">
                                <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection