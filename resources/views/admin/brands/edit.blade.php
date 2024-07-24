<!-- edit.blade.php -->

@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Brand</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.brands.update', $brand->brand_id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ $brand->name }}" required autofocus>
                            @error('name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="slug">Slug</label>
                            <input id="slug" type="text" class="form-control" name="slug" value="{{ $brand->slug }}" required>
                            @error('slug')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <img src="{{ asset('assets/images/uploads/brands/'.$brand->image) }}" width="70px" height="70px" alt="Image">
                            @error('image')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
