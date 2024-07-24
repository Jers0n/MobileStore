<!-- edit.blade.php -->

@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Category</h2><hr>

                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('admin.categories.update', $category->category_id) }}">
                            @csrf
                            @method('PUT')
    
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ $category->name }}" required autofocus>
                            </div>
    
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input id="slug" type="text" class="form-control" name="slug" value="{{ $category->slug }}" required>
                            </div>
                            
                            <br>
                            <div class="card-footer form-group">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
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
