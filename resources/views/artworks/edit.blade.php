@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Edit Artworks Page</div>
        <div class="card-body">

            <form action="{{ url('artwork/' .$artworks->id) }}" method="post">
                @csrf
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$artworks->id}}"/>
                <label>Name</label>
                <input type="text" name="name" id="name" value="{{$artworks->name}}"
                       class="form-control @error('name') is-invalid @enderror"
                       required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <label>Artist</label>
                <input type="text" name="artist" id="artist" value="{{$artworks->artist}}"
                       class="form-control @error('artist') is-invalid @enderror"
                       required autocomplete="artist" autofocus>
                @error('artist')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <label>Description</label>
                <input type="text" name="description" id="description" value="{{$artworks->description}}"
                       class="form-control @error('description') is-invalid @enderror"
                       required autocomplete="description" autofocus>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <label>Year</label>
                <input type="number" name="year" id="year" value="{{$artworks->year}}"
                       class="form-control @error('year') is-invalid @enderror"
                       required autocomplete="year" autofocus>
                @error('year')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <label>Price</label>
                <input type="number" name="price" id="price" value="{{$artworks->price}}"
                       class="form-control @error('price') is-invalid @enderror"
                       required autocomplete="price" autofocus>
                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <input type="submit" value="Update" class="btn btn-success">
            </form>

        </div>
    </div>
@stop
