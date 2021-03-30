@extends('default')

@section('title')
    {{'Voedingsmiddelen'}}
@endsection

@section('content')
<ul class="u-grid-12 u-grid-gap-2">
    @foreach($foods as $food)
        @include('foods.foods')
    @endforeach
</ul>
@endsection