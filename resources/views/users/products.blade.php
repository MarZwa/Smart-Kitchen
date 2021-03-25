@extends('default')

@section('content')
    @foreach($products as $product)
        <p>{{$product->user_name}}</p>
        <p>{{$product->calories}}</p>
        <p>{{$product->alcohol}}</p>
        <p>{{$product->date}}</p>
    @endforeach
@endsection