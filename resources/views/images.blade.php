@extends('layouts.main')

@section('style')
    <style>
        .img-thumbnail{
            max-width: 260px !important;
        }
    </style>
@endsection

@section('main')
<section class="position-relative w-100 vh-80" data-aos="zoom-in-up" data-aos-duration='4000'>
    <div class="col-md-10">
        @foreach($user->images as $i => $image)
            <a class="example-image-link" href="{{ url('images/' . $image->path) }}" data-lightbox="roadtrip">
                <img class="img-thumbnail example-image img-rounded" src="{{ url('images/' . $image->path) }}" alt="{{ $image->alt }}" />
            </a>
            @endforeach
        </div>   
</section>
@endsection