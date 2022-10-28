@extends('artworks.layout')
@section('content')
    <div class="card">
        <div class="card-header">Artworks Page</div>
        <div class="card-body">

            <div class="card-body">
                <h5 class="card-title">Name : {{ $artworks->name }}</h5>
                <p class="card-text">Artist : {{ $artworks->artist }}</p>
                <p class="card-text">Description : {{ $artworks->description }}</p>
                <p class="card-text">Year : {{ $artworks->year }}</p>
                <p class="card-text">Price : {{ $artworks->price }}</p>
            </div>

            </hr>

        </div>
    </div>
