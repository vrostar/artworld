@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('HOME') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Welcome to ARTWORLD, have a look at our wonderful art catalogue or add some art yourself!</h1>
                        <h3>Please, if you haven't already, create an account before doing anything!</h3>
                        <p>ARTWORLD has a verification system which gives users more benefits such as: adding your own art.
                        to verify your account please look at 5 different artworks, a windwow should pop up allowing you to
                        gain verification</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
