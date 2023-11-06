@extends('layout.master')

@section('products')

@foreach ($products as $product)
{{!!$product !!}}
@endforeach

@endsection







