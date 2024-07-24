@extends('layouts.template')

@section('content')
<div class="container" style="min-height: 57vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-10">
                <div class="card-header">
                    <h2>Profile</h2>
                    <hr>
                    <div class="card-body bg-white">
                        <div class="mb-3">
                            @if(Route::has('login'))
                                @auth
                                    @if(Auth::user()->utype === 'ADM')
                                        <div class="mb-3">
                                            <p>Name: {{ $user->name }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <p>Email: {{ $user->email }}</p>
                                        </div>
                                    @elseif(Auth::user()->utype === 'MGR')
                                        <li>
                                            <div class="mb-3">
                                                <p>Name: {{ $user->name }}</p>
                                            </div>
                                            <div class="mb-3">
                                                <p>Email: {{ $user->email }}</p>
                                            </div>
                                        </li>
                                    @else
                                        <div class="mb-3">
                                            <p>Name: {{ $user->name }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <p>Email: {{ $user->email }}</p>
                                        </div>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?')">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
