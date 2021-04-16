<nav class="dashboard-navigation u-z-2">
    <a class="back-link u-z-3" href="/">Back to Homepage</a>
    <div class="navigation-icon u-z-3" onclick="changeIconDashboard()">
        <div class="top"></div>
        <div class="middle"></div>
        <div class="bottom"></div>
    </div>
    <section class="dashboard-navigation__profile u-z-2">
        <section class="dashboard-navigation__profile__heading">
            <figure class="dashboard-navigation__profile__picture">
                <img src="{{asset(str_replace('public', 'storage', $user->image))}}" alt="Profiel foto van {{$user->id}}">
            </figure>
            <h2 class="dashboard-navigation__profile__name">{{$user->name}}</h2>
        </section>
        <ul class="dashboard-navigation__menu">
            <li class="dashboard-navigation__menu__item"><a class="dashboard-navigation__menu__link" href="/users/{{$user->id}}">Dashboard</a></li>
            <li class="dashboard-navigation__menu__item"><a class="dashboard-navigation__menu__link" href="/users/{{$user->id}}/products">Product Consumptie</a></li>
            <li class="dashboard-navigation__menu__item"><a class="dashboard-navigation__menu__link" href="/">Nutratie consumptie</a></li>
            <li class="dashboard-navigation__menu__item"><a class="dashboard-navigation__menu__link" href="/user/{{$user->id}}/edit">Profiel Aanpassen</a></li>
            <li class="dashboard-navigation__menu__item"><a class="dashboard-navigation__menu__link" href="/users">Verander Profiel</a></li>
            <li class="dashboard-navigation__menu__item"><a class="dashboard-navigation__menu__link" href="/user/delete/{{$user->id}}">Verwijder Profiel</a></li>
        </ul>
    </section>
</nav>