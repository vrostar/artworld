@extends('layouts.app')
@section('content')
    @if(session()->exists('artworkSeen'))
        @php
            $i = session()->get('artworkSeen');
            error_log($i);
            $i ++;
            session()->put('artworkSeen', $i)
        @endphp

        @if($i >= 5 and !Auth::user()->verified_status)
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">VERIFICATION COMPLETE</h4>
                <p>YOU HAVE VIEWED 5 ARTWORKS AND CAN NOW COMPLETE THE VERIFICATION PROCESS</p>
                <hr>
                <btn class="btn btn-success" href="{{ route('users.verify-user', Auth::id()) }}"
                     onclick="event.preventDefault();document.getElementById('verification').submit();">Verify me!!!</btn>

                <form id="verification" action="{{ route('users.verify-user', Auth::id()) }}" method="POST">
                    @csrf
                </form>
            </div>
        @endif
    @else
        @php
            session()->put('artworkSeen', 1)
        @endphp
    @endif
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
@endsection
