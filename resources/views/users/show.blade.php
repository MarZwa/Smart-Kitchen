@extends('default')

@section('content')
        <article class="profile-dashboard">
                <section class="dashboard">
                @include('users.components.dashboard--profile')
                </section>
        </article>
@endsection