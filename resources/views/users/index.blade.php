@extends('default')

@section('content')
    @foreach($users as $user)
        <p>{{$user->name}}</p>
        <p>{{$user->rfid}}</p>
        <p>{{$user->calories}}</p>
        <p>{{$user->alcohol}}</p>
    @endforeach
@endsection