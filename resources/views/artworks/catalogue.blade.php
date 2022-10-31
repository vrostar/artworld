@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>ARTWORKS</h2>
                        <div class="d-flex justify-content input-group-lg col col-auto mb-2">
                            <form action="{{route('search')}}" method="POST">
                                @csrf
                                <label for="search"></label><input type="text" class="form-control-sm" name="search" id="search"
                                                                   placeholder="Search...">
                                <button type="submit" class="btn btn-success mb-1">Go<i class="fa fa-search"></i></button>
                            </form>
                            <br>
                        </div>
                    </div>
                    <div class="card-body">
                        @if((Auth::user()->verified_status == '1'))
                        <a href="{{ url('/artwork/create') }}" class="btn btn-success btn-sm" title="Add New Artwork">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        @endif
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
{{--                                    hide item if its not active--}}
                                    @if($item->active === 0)
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
                                    @endif
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
