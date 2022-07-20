@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <nav class="nav flex-column">
                        <a class="nav-link" href="/user">Users</a>
                        <a class="nav-link" href="#">Products</a>
                    </nav>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <user-component />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
