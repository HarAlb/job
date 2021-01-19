@extends('layouts.main')

@section('main')
<section class="position-relative w-100 vh-80" data-aos="zoom-in-up" data-aos-duration='4000'>
    <div class="container">
        @include('layouts.slider')
    </div>
</section>
@include('layouts.modal')
@endsection