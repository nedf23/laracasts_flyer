@extends('layout')

@section('content')
    <h1>Selling Your Home?</h1>
    <hr>
    <form action="/flyers" method="post" enctype="multipart/form-data">
        @include('flyers.form')

        @include('errors')
    </form>
@stop