@extends('layout.master')

@section('content')


<div class="col-sm-6 col-md-4 col-lg-3">
    <div class="box">
        <a href="/{{$product->slug}}">
        <div class="img-box">
            <img src="/src/images/{{$product->img}}" alt="">
        </div>
        <div class="detail-box">
            <h6>
                {{$product->title}}
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

@endsection


@section('name')
   {{$product->title}}
@endsection
