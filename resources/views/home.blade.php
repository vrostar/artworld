@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome to ARTWORLD, have a look at our wonderful art catalogue!') }}
                        <a href="{{ url('/artwork') }}">Art (admin)</a>
                        <a href="{{ url('/catalogue') }}">Catalogue</a>
                        <a href="{{ url('/users') }}">Users admin</a>
                        <a href="{{ url('/users/profile') }}">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
