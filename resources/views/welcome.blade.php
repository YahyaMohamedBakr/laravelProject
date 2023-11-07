
@extends('layout.master')

@section('content')

    @foreach ($products as $product)

    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3">

    {!!$product->body!!}
    <div class="detail-box">
    <h6>
    <a href="/{{$product->slug}}"> {{ $product->title}}</a>
    </h6>
    <h6>
        Price
        <span>
        {{$product->price}}
        </span>
    </h6>
    </div>
    <div class="new">
    <span>
        {{$product->category}}
    </span>
    </div>
    </a>
    </div>
    </div>

    @endforeach
{{-- {!! $products!!} --}}
@endsection


