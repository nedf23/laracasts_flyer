@extends('layout')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css">
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h1>{{ $flyer->street }}</h1>
            <h2>{!! $flyer->price !!}</h2>
            <hr>
            <div class="description">{!! nl2br($flyer->description) !!}</div>
        </div>
        <div class="col-md-8">
            @foreach ($flyer->photos->chunk(4) as $set)
                <div class="row gallery">
                    @foreach ($set as $photo)
                        <div class="col-md-3 gallery__image">
                            <img src="/{{ $photo->thumbnail_path }}" alt="{{ $photo->name }}">
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <hr>
    <h2>Add Photos</h2>
    <form id="addPhotosForm" action="/{{ $flyer->zip }}/{{ $flyer->street }}/photos" class="dropzone" method="post">
        {{ csrf_field() }}
    </form>
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {
            paramName: 'photo',
            maxFilesize: 3,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp'
        }
    </script>
@stop