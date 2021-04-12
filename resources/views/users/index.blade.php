@extends('default')

@section('content')
    <p>{{$user->name}}</p>
    <p>{{$user->rfid}}</p>
    <p>{{$user->calories}}</p>
    <p>{{$user->alcohol}}</p>
@endsection