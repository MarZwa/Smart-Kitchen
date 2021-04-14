@extends('default')

@section('content')
    @include('users.components.dashboard--profile')
    @foreach($users as $user)
        <p>{{$user->name}}</p>
    @endforeach
@endsection