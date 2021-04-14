@extends('default')

@section('content')
    @include('components.navigation')

    <article class="profiles">
        <ul class='profiles__wrapper'>
            @foreach ($users as $user)
                @include('users.components.userCard')
            @endforeach
            <li class="new-profile">
                <a class="profile-link" href="/user/create">
                    <article>
                        <h2><i class="fas fa-plus-circle fa-3x"></i></h2>
                        <p>Nieuw profiel toevoegen</p>
                    </article>
                </a>
            </li>
        </ul>
    </article>
@endsection