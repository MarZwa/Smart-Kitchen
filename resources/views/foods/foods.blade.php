@extends('default')

@section('css')
    <link rel="stylesheet" href="/css/foods_cutlery.css">
@endsection

@section('js')
    <script src="/js/foods.js" defer></script>
    <script src="/js/main.js" defer></script>
@endsection

@section('title')
    Voedingsmiddelen
@endsection

@section('content')
<main class="foods-dashboard">
    <article class="dashboard">
        @include('components.dashboard-navigation')
    </article>
    <article class="dashboard-content u-margin-left-right-1rem">
        <h1 class="u-header">Voedingsmiddelen tracker</h1>
        <section class="buttonSection">
            <a class="buttonSection__button" href="/foods/{{ $user -> id }}">Overzicht</a>
            <a class="buttonSection__button" href="/foods/{{ $user -> id }}/daily">Dagelijks</a>
            <a class="buttonSection__button" href="/foods/{{ $user -> id }}/weekly">Wekelijks</a>
        </section>
        <h2 class="u-text-align-center u-header u-margin-1rem">Overzicht</h2>
        <ul class="u-grid-12 u-grid-gap-2 u-desktop-width">
            <li class="u-list-style-none foodCard u-display-flex">
                <section>
                    <header class="foodCard__header">
                        <h3 class="u-header foodCard__heading">Groente</h3>
                    </header>
                    <div class="foodCard__progressSection">
                        <label class="foodCard__label" for="groente">{{ $user -> groente }} g / {{ $foods -> groente }} g</label>
                        <label class="foodCard__label" for="groente">{{ $foods -> groente - $user -> groente }} g te gaan!</label>
                        <progress id="groente" class="foodCard__progress" value="{{ $user -> groente }}" max="{{ $foods -> groente }}"></progress>
                    </div>
                </section>
            </li>

            <li class="u-list-style-none foodCard u-display-flex">
                <section>
                    <header class="foodCard__header">
                        <h3 class="u-header foodCard__heading">Fruit</h3>
                    </header>
                    <div class="foodCard__progressSection">
                        <label class="foodCard__label" for="fruit">{{ $user -> fruit }} g / {{ $foods -> fruit }} g</label>
                        <label class="foodCard__label" for="fruit">{{ $foods -> fruit - $user -> fruit }} g te gaan!</label>
                        <progress id="fruit" class="foodCard__progress" value="{{ $user -> fruit }}" max="{{ $foods -> fruit }}"></progress>
                    </div>
                </section>
            </li>

            <li class="u-list-style-none foodCard u-display-flex">
                <section>
                    <header class="foodCard__header">
                        <h3 class="u-header foodCard__heading">Brood</h3>
                    </header>
                    <div class="foodCard__progressSection">
                        <label class="foodCard__label" for="brood">{{ $user -> brood }} st / {{ $foods -> brood }} st</label>
                        <label class="foodCard__label" for="brood">{{ $foods -> brood - $user -> brood }} st te gaan!</label>
                        <progress id="brood" class="foodCard__progress" value="{{ $user -> brood }}" max="{{ $foods -> brood }}"></progress>
                    </div>
                </section>
            </li>

            <li class="u-list-style-none foodCard u-display-flex">
                <section>
                    <header class="foodCard__header">
                        <h3 class="u-header foodCard__heading">Graanproducten en aardappelen</h3>
                    </header>
                    <div class="foodCard__progressSection">
                        <label class="foodCard__label" for="aardappelen">{{ $user -> aardappelen }} g / {{ $foods -> aardappelen }} g</label>
                        <label class="foodCard__label" for="aardappelen">{{ $foods -> aardappelen - $user -> aardappelen }} g te gaan!</label>
                        <progress id="aardappelen" class="foodCard__progress" value="{{ $user -> aardappelen }}" max="{{ $foods -> aardappelen }}"></progress>
                    </div>
                </section>
            </li>

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

            <li class="u-list-style-none foodCard u-display-flex">
                <section>
                    <header class="foodCard__header">
                        <h3 class="u-header foodCard__heading">Noten</h3>
                    </header>
                    <div class="foodCard__progressSection">
                        <label class="foodCard__label" for="noten">{{ $user -> noten }} g / {{ $foods -> noten }} g</label>
                        <label class="foodCard__label" for="noten">{{ $foods -> noten - $user -> noten }} g te gaan!</label>
                        <progress id="noten" class="foodCard__progress" value="{{ $user -> noten }}" max="{{ $foods -> noten }}"></progress>
                    </div>
                </section>
            </li>

            <li class="u-list-style-none foodCard u-display-flex">
                <section>
                    <header class="foodCard__header">
                        <h3 class="u-header foodCard__heading">Melk en melkproducten</h3>
                    </header>
                    <div class="foodCard__progressSection">
                        <label class="foodCard__label" for="melk">{{ $user -> melk }} g / {{ $foods -> melk }} g</label>
                        <label class="foodCard__label" for="melk">{{ $foods -> melk - $user -> melk }} g te gaan!</label>
                        <progress id="melk" class="foodCard__progress" value="{{ $user -> melk }}" max="{{ $foods -> melk }}"></progress>
                    </div>
                </section>
            </li>

            <li class="u-list-style-none foodCard u-display-flex">
                <section>
                    <header class="foodCard__header">
                        <h3 class="u-header foodCard__heading">Kaas</h3>
                    </header>
                    <div class="foodCard__progressSection">
                        <label class="foodCard__label" for="kaas">{{ $user -> kaas }} g / {{ $foods -> kaas }} g</label>
                        <label class="foodCard__label" for="kaas">{{ $foods -> kaas - $user -> kaas }} g te gaan!</label>
                        <progress id="kaas" class="foodCard__progress" value="{{ $user -> kaas }}" max="{{ $foods -> kaas }}"></progress>
                    </div>
                </section>
            </li>

            <li class="u-list-style-none foodCard u-display-flex">
                <section>
                    <header class="foodCard__header">
                        <h3 class="u-header foodCard__heading">Smeer- en bereidingsvetten</h3>
                    </header>
                    <div class="foodCard__progressSection">
                        <label class="foodCard__label" for="vetten">{{ $user -> vetten }} g / {{ $foods -> vetten }} g</label>
                        <label class="foodCard__label" for="vetten">{{ $foods -> vetten - $user -> vetten }} g te gaan!</label>
                        <progress id="vetten" class="foodCard__progress" value="{{ $user -> vetten }}" max="{{ $foods -> vetten }}"></progress>
                    </div>
                </section>
            </li>
        </ul>
    </article>
</main>
@endsection