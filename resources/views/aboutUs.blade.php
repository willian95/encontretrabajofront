@extends('layouts.main')

@section('content')

    @include('partials.navbar')

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-top: 7rem;">
                <img src="{{ $image }}" alt="" style="width: 100%">
            </div>
            <div class="col-md-10 offset-md-1" style="margin-top: 1rem;">
                {!! $text !!}
            </div>
        </div>
    </div>


@endsection