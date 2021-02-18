@extends('layout')

@section('content')
    <h1> Home page Data </h1>
    @if(Session::get('user'))
         {{ Session::get('user') }}
    @endif


@endsection
