@extends('layouts.main')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <div class="col-12">
            <h3>Quienes Somos</h3>
        </div>
        <div class="row">
            <div class="col-md-5 " style="margin-top: 7rem;">
                <img src="{{ $image }}" alt="" style="width: 100%">
            </div>
            
            <div class="col-md-7" style="margin-top: 1rem;">
                {!! $text !!}
            </div>
            <div class="col-md-12">
                {!! $text2 !!}
            </div>
        </div>
    </div>


@endsection