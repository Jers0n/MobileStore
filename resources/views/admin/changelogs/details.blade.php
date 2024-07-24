@extends('layouts.template')
@section('content')
<style>
    .value-width {
        max-width: 300px;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .value-header {
        text-decoration: underline;
        margin-bottom: 3px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Changelog Details</h4>
                    <hr>
                    <div class="card-body bg-white">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="value-header"><b>Original Values</b></h5>
                                @foreach($originalValues as $field => $value)
                                <div class="value-width"><strong>{{ $field }}</strong>: {{ $value }}</div>
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                <h5 class="value-header"><b>Updated Values</b></h5>
                                @foreach($updatedValues as $field => $value)
                                <div class="value-width"><strong>{{ isset($originalValues[$field]) ? $field : '' }}</strong>: {{ $value }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.changelogs.index') }}" class="btn btn-secondary">Back to Changelogs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection