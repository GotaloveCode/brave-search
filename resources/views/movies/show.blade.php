@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-4 mt-4">
                <div class="card">
                    @if(isset($movie))
                        @include('components.movie', $movie)
                    @else
                        @include('components.no-movies')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
