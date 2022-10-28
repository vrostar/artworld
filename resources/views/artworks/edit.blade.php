@extends('artworks.layout')
@section('content')
    <div class="card">
        <div class="card-header">Contactus Page</div>
        <div class="card-body">

            <form action="{{ url('artwork/' .$artworks->id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$artworks->id}}" id="id" />
                <label>Name</label></br>
                <input type="text" name="name" id="name" value="{{$artworks->name}}" class="form-control"></br>
                <label>Artist</label></br>
                <input type="text" name="artist" id="artist" value="{{$artworks->artist}}" class="form-control"></br>
                <label>Description</label></br>
                <input type="text" name="description" id="description" value="{{$artworks->description}}" class="form-control"></br>
                <label>Year</label></br>
                <input type="text" name="year" id="year" value="{{$artworks->year}}" class="form-control"></br>
                <label>Price</label></br>
                <input type="text" name="price" id="price" value="{{$artworks->price}}" class="form-control"></br>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@stop
