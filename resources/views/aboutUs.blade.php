@extends('layouts.main')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <div class="col-12">
            <h3>Quienes Somos</h3>
        </div>
        <div class="row" style="margin-top: 7rem;">
            <div class="col-md-5 ">
                <img src="{{ $image }}" alt="" style="width: 100%">
            </div>
            
            <div class="col-md-7">
                {!! $text !!}
            </div>
            <div class="col-md-12">
                {!! $text2 !!}
            </div>
        </div>
    </div>


@endsection