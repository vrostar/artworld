@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-4 col-6">
                @if (session('alert'))
                    <div class="alert alert-success" role="alert">
                        {{ session('alert') }}
                    </div>
                @endif
                <h2>List of Categories</h2>
                <div>
                    @if((Auth::user()->verified_status == '1'))
                        <btn class="btn btn-info"><a href="{{route('categories.create')}}" class="link page-link">Add
                                new category</a>
                        </btn>
                    @endif
                        <br>
                    <br>
                    @foreach($categories as $category)
                        <div class="card">
                            <div class="card-header text-bg-dark"><h1><a class="link page-link"
                                                                         href="/categories/{{$category->id}}">{{$category->name}}</a>
                                </h1>
                                <div class="justify-content-end row row-cols-auto">
                                    @if((Auth::user()->verified_status == '1'))
                                        <a class="btn btn-secondary btn-outline-light"
                                           href="/categories/{{$category->id}}/edit">
                                            <i class="fa fa-pencil" aria-hidden="true">Edit</i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <p>{{$category->description}}</p>
                                @foreach($category->artworks as $artwork)
                                    <p><a href="/artwork/{{$artwork->id}}">{{$artwork->name}}</a></p>
                                @endforeach
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
