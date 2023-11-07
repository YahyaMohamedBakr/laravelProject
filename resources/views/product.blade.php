@extends('layout.master')

@section('content')


        {!!$product->body()!!}
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

@endsection


@section('name')
   {{$product->title}}
@endsection
