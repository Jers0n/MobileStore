@extends('layouts.template')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Create Brand</h2>
                    <hr>
                    <div class="card-body bg-white">
                        <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required autofocus value={{ old('name') }}>
                                @error('name')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" required value={{ old('slug') }}>
                                @error('slug')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" value={{ old('image') }} required>
                                @error('image')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="card-footer d-flex justify-content-between">
                                <div class="mb-3">
                                    <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Back to Brands</a>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Create</button>
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


@section('styles')
    <!-- Normalize.css -->
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
@endsection
