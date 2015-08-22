@extends('layout')

@section('content')
    <h1>Selling Your Home?</h1>
    <hr>
    <form action="/flyers" method="post">
        @include('flyers.form')

        @include('errors')
    </form>
@stop