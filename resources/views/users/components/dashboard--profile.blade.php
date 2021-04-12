<section class="dashboard__heading">
    <h1 class="dashboard__logo"><a class="dashboard__profile__menu__link" href="/">Smart Kitchen</a></h1>
    <div class="dashboard__menu-icon" onclick="changeIcon()">
        <div class="top"></div>
        <div class="middle"></div>
        <div class="bottom"></div>
    </div>
</section>
<section class="dashboard__profile u-z-2">
    <section class="dashboard__profile__heading">
        <figure class="dashboard__profile__picture">
            <img src="/img/profile-placeholder.png" alt="profile placeholder">
        </figure>
        <h2 class="dashboard__profile__name">{{$user->name}}</h2>
    </section>
    <section class="dashboard__profile__body">
        <ul class="dashboard__profile__menu">
            <li class="dashboard__profile__menu__item"><a class="dashboard__profile__menu__link" href="/users/{{$user->id}}">Dashboard</a></li>
            <li class="dashboard__profile__menu__item"><a class="dashboard__profile__menu__link" href="/users/{{$user->id}}/products">Product Consumptie</a></li>
            <li class="dashboard__profile__menu__item">Nutratie consumptie</li>
            <li class="dashboard__profile__menu__item">Edit Profile</li>
        </ul>
    </section>
</section>