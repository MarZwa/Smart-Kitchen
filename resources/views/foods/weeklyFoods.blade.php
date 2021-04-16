@extends('default')

@section('css')
    <link rel="stylesheet" href="/css/foods_cutlery.css">
@endsection

@section('js')
    <script src="/js/foods.js"></script>
@endsection

@section('title')
    Voedingsmiddelen
@endsection

@section('content')
<main class="foods-dashboard">
    <article class="dashboard">
        @include('components.dashboard-navigation')
    </article>
    <article class="dashboard-content">
        <h1 class="u-header">Voedingsmiddelen tracker</h1>
        <section class="buttonSection">
            <a class="buttonSection__button" href="/foods/{{ $user -> id }}">Overzicht</a>
            <a class="buttonSection__button" href="/foods/{{ $user -> id }}/daily">Dagelijks</a>
            <a class="buttonSection__button" href="/foods/{{ $user -> id }}/weekly">Wekelijks</a>
        </section>
        <h2 class="u-text-align-center u-header u-margin-1rem">Wekelijks</h2>
        <ul class="u-grid-12 u-grid-gap-2 u-desktop-width">
            <li class="u-list-style-none foodCard u-display-flex">
                <section>
                    <header class="foodCard__header">
                        <h3 class="u-header foodCard__heading">Vis</h3>
                    </header>
                    <div class="foodCard__progressSection">
                        <label class="foodCard__label" for="vis">{{ $user -> vis }} g / {{ $foods -> vis }} g</label>
                        <label class="foodCard__label" for="vis">{{ $foods -> vis - $user -> vis }} g te gaan!</label>
                        <progress id="vis" class="foodCard__progress" value="{{ $user -> vis }}" max="{{ $foods -> vis }}"></progress>
                    </div>
                </section>
            </li>

            <li class="u-list-style-none foodCard u-display-flex">
                <section>
                    <header class="foodCard__header">
                        <h3 class="u-header foodCard__heading">Peulvruchten</h3>
                    </header>
                    <div class="foodCard__progressSection">
                        <label class="foodCard__label" for="peulvruchten">{{ $user -> peulvruchten }} g / {{ $foods -> peulvruchten }} g</label>
                        <label class="foodCard__label" for="peulvruchten">{{ $foods -> peulvruchten - $user -> peulvruchten }} g te gaan!</label>
                        <progress id="peulvruchten" class="foodCard__progress" value="{{ $user -> peulvruchten }}" max="{{ $foods -> peulvruchten }}"></progress>
                    </div>
                </section>
            </li>

            <li class="u-list-style-none foodCard u-display-flex">
                <section>
                    <header class="foodCard__header">
                        <h3 class="u-header foodCard__heading">Vlees</h3>
                    </header>
                    <div class="foodCard__progressSection">
                        <label class="foodCard__label" for="vlees">{{ $user -> vlees }} g / {{ $foods -> vlees }} g</label>
                        <label class="foodCard__label" for="vlees">{{ $foods -> vlees - $user -> vlees }} g te gaan!</label>
                        <progress id="vlees" class="foodCard__progress" value="{{ $user -> vlees }}" max="{{ $foods -> vlees }}"></progress>
                    </div>
                </section>
            </li>

            <li class="u-list-style-none foodCard u-display-flex">
                <section>
                    <header class="foodCard__header">
                        <h3 class="u-header foodCard__heading">Ei</h3>
                    </header>
                    <div class="foodCard__progressSection">
                        <label class="foodCard__label" for="ei">{{ $user -> ei }} st / {{ $foods -> ei }} st</label>
                        <label class="foodCard__label" for="ei">{{ $foods -> ei - $user -> ei }} st te gaan!</label>
                        <progress id="ei" class="foodCard__progress" value="{{ $user -> ei }}" max="{{ $foods -> ei }}"></progress>
                    </div>
                </section>
            </li>
    </article>
</main>
@endsection