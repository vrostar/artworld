@extends('artworks.layout')
@section('content')
    <div class="card">
        <div class="card-header">Artworks Page</div>
        <div class="card-body">

            <form action="{{ url('artwork') }}" method="post">
                {!! csrf_field() !!}
                <label>Name</label></br>
                <input type="text" name="name" id="name" class="form-control"></br>
                <label>Artist</label></br>
                <input type="text" name="artist" id="artist" class="form-control"></br>
                <label>Description</label></br>
                <input type="text" name="description" id="description" class="form-control"></br>
                <label>Year</label></br>
                <input type="text" name="year" id="year" class="form-control"></br>
                <label>Price</label></br>
                <input type="text" name="price" id="price" class="form-control"></br>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@stop
