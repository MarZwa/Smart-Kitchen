@extends('default')

@section('content')
    @include('components.navigation')

    <article class="profiles">
        <ul class='profiles__wrapper'>
            @foreach ($users as $user)
                @include('users.userCard')
            @endforeach
        </ul>
    </article>
@endsection