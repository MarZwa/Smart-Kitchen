@extends('default')

@section('content')
    <article class="profile-dashboard">
        <section class="dashboard">
                @include('users.components.dashboard--profile')
        </section>
        <p>{{$users->name}}</p>
    </article>
@endsection