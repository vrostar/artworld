@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('alert'))
                    <div class="alert alert-success" role="alert">
                        {{ session('alert') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h1>Edit Profile</h1>
                    </div>
                    <div class="card-body">
                        <form action="/users/{{$user->id}}" method="POST">
                            @csrf
                            <input id="id"
                                   name="id"
                                   type="hidden"
                                   value="{{$user->id}}}">
                            <label for="name">Name: </label>
                            <input id="name"
                                   name="name"
                                   type="text"
                                   value="{{old("name", $user->name)}}"
                                   class="input-group-text @error("name") is-invalid @enderror">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <label for="email">E-mail: </label>
                            <input id="email"
                                   name="email"
                                   type="text"
                                   value="{{old("description", $user->email)}}"
                                   class="input-group-text @error("email") is-invalid @enderror">
                            @error("description")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <label for="password">Password: </label>
                            <input id="password"
                                   name="password"
                                   type="password"
                                   value=""
                                   class="input-group-text @error("password") is-invalid @enderror">
                            @error("description")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <br>
                            <input class="btn btn-primary" type="submit" value="Save changes">
                        </form>
                        <br>
                        <div>
                            Verification:
                            @if($user->verified_status == 1)
                                <p>Your account is verified.</p>
                            @else
                                <p>Your account has not been verified yet.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                    <div class="card">
                        <div class="card-header bg-warning">
                            <h1>Delete account</h1>
                        </div>
                        <div class="card-body">
                            <h5>Do you want to delete your account? This can not be undone.</h5>
                            <br>
                            <form action="{{route('users.destroy', $user->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input id="id"
                                       name="id"
                                       type="hidden"
                                       value="{{$user->id}}">
                                <input type="submit" value="Yes" class="btn btn-warning">
                            </form>
                        </div>
                    </div>
            </div>
        </div>
@endsection
