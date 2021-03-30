@extends('default')

@section('content')
    <article class="profile-dashboard">
        <section class="dashboard">
        @include('users.components.dashboard--profile')
        </section>

        <section class="dashboard-content">
            @include('users.components.calories--progression-bar')
            @include('users.components.alcohol--progression-bar')
        </section>
    </article>
@endsection