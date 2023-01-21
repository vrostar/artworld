@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>ARTWORKS</h2>
                        <form action="{{ route('search') }}" method="POST">
                            @csrf
                            <label for="search"></label>
                            <input
                                type="text" class="form-control"
                                name="search"
                                id="search"
                                placeholder="Search..."
                                value="{{request('search')}}"
                            >
                            <br>
                            <div class="mb-4 col-6">
                                <div class="btn-group btn-group">
                                    @if(request(['searchCategory']))
                                        @php
                                            $searchRequest = request(['searchCategory'][0]);
                                        @endphp

                                        @foreach($categories as $category)
                                            @if(in_array($category->id, $searchRequest))

                                                <input class="btn-check" name="searchCategory[]" type="checkbox"
                                                       id="category-{{$category->id}}" value="{{$category->id}}" checked>

                                                <label class="btn btn-outline-success"
                                                       for="category-{{$category->id}}">{{$category->name}}</label>
                                            @else
                                                <input class="btn-check" name="searchCategory[]" type="checkbox"
                                                       id="category-{{$category->id}}" value="{{$category->id}}">

                                                <label class="btn btn-outline-success"
                                                       for="category-{{$category->id}}">{{$category->name}}</label>
                                            @endif
                                        @endforeach

                                    @else
                                        @foreach($categories as $category)
                                            <input class="btn-check" name="searchCategory[]" type="checkbox"
                                                   id="category-{{$category->id}}" value="{{$category->id}}">

                                            <label class="btn btn-outline-success"
                                                   for="category-{{$category->id}}">{{$category->name}}</label>
                                        @endforeach
                                    @endif

                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="card-body">
                        <a href="{{ url('/artwork/create') }}" class="btn btn-success btn-sm" title="Add New Artwork">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Artist</th>
                                    <th>Description</th>
                                    <th>Year</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($artworks as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->artist }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->year }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <a href="{{ url('/artwork/' . $item->id) }}" title="View Artwork">
                                                <button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                                                       aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
