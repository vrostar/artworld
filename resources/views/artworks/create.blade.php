@extends('layouts.app')
@section('content')
    @if(auth()->user()->isVerified() || auth()->user()->isAdmin())
    <div class="card">
        <div class="card-header">Artworks Page</div>
        <div class="card-body">

            <form action="{{ url('artwork') }}" method="post">
                @csrf

                <label>Name</label></br>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                       required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <label>Artist</label></br>
                <input type="text" name="artist" id="artist" class="form-control @error('artist') is-invalid @enderror"
                       required autocomplete="artist" autofocus>
                @error('artist')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <label>Description</label></br>
                <textarea type="text" name='description' id='description'
                          class="form-control @error('description') is-invalid @enderror"
                          required autocomplete="description" autofocus></textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <label>Year</label></br>
                <input type="number" name="year" id="year" class="form-control @error('year') is-invalid @enderror"
                       required autocomplete="year" autofocus>
                @error('year')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <label>Price</label></br>
                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror"
                       required autocomplete="price" autofocus>
                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <div>
                    Categories:
                    @foreach($categories as $category)
                        <div class="form-check">
                            <label class="form-check-label"
                                   for="flexCheckDefault">{{$category->name}}</label>
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault"
                                   name="category_id[]" value="{{$category->id}}">
                        </div>
                    @endforeach
                    @error("category_id[]")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input type="submit" value="Save" class="btn btn-success">
            </form>
        </div>
    </div>
    @else
        <meta http-equiv="Refresh" content="0; url='/404'" />
    @endif
@stop
