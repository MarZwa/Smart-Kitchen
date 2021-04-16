<li>
    <a class="profile-link" href="/users/{{$user->id}}">
        <article class="profile">
            <section class="profile__heading">
                <h2 class="profile__name">{{$user->name}}</h2>
            </sectiion>
            <figure class="profile__image">
                <img src="{{asset(str_replace('public', 'storage', $user->image))}}" alt="Profiel foto van {{$user->name}}">
            </figure>
        </article>
    </a>
</li>