@extends('default')

@section('content')
    @foreach($profiles as $profile)
        <p>{{$profile->name}}</p>
        <p>{{$profile->CG}}</p>
        <p>{{$profile->AG}}</p>
    @endforeach
@endsection