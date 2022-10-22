@extends('layouts.app')
@section('content')
        @if(isset($movies) && $movies->count() > 0)
            @include('components.movies', $movies)
        @else
            @include('components.no-movies')
        @endif
@endsection
