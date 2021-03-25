@extends('default')

@section('content')
    <article class="dashboard">
        <section class="dashboard__profile">
            <section class="dashboard__heading">
            <h1 class="dashboard__logo">Dashboard</h1>
            <div class="dashboard__menu__icon" onclick="changeIcon()">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            </section>
            <ul class="dashboard__menu">
                <li class="dashboard__menu__item">Item 1</li>
                <li class="dashboard__menu__item">Item 2</li>
                <li class="dashboard__menu__item">Item 3</li>
                <li class="dashboard__menu__item">Item 4</li>
            </ul>
        </section>
    </article>
@endsection