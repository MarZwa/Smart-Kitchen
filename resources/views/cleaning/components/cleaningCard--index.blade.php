@extends('cleaning.index')

<ul class="u-flex-column u-flex-gap-2">
    @foreach($lastEntry as $lastEntry)
        @include('cleaning.components.cleaningCard--index')
    @endforeach
</ul>
@endsection