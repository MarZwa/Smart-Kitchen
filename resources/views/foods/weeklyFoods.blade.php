@extends('default')

@section('css')
    <script src="/css/foods_cutlery.css"></script>
@endsection

@section('title')
    Voedingsmiddelen {{$user->id}}
@endsection

@section('content')
    <h1 class="u-header">Voedingsmiddelen tracker</h1>
    <article class="buttonSection">
        <button class="buttonSection__button"><a href="/foods/{{ $user -> id }}">Overzicht</a></button>
        <button class="buttonSection__button"><a href="/foods/{{ $user -> id }}/daily">Dagelijks</a></button>
        <button class="buttonSection__button"><a href="/foods/{{ $user -> id }}/weekly">Wekelijks</a></button>
    </article>
    <h2 class="u-text-align-center u-header u-margin-1rem">Wekelijks</h2>
    <ul class="u-grid-12 u-grid-gap-2 u-desktop-width">
        <li class="u-list-style-none foodCard u-display-flex">
            <article>
                <header class="foodCard__header">
                    <h3 class="u-header" class="foodCard__heading">Vis</h3>
                </header>
                <section class="foodCard__progressSection">
                    <label class="foodCard__label" for="vis">{{ $user -> vis }} g / {{ $foods -> vis }} g</label>
                    <label class="foodCard__label" for="vis">{{ $foods -> vis - $user -> vis }} g te gaan!</label>
                    <progress id="vis" class="foodCard__progress" value="{{ $user -> vis }}" max="{{ $foods -> vis }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none foodCard u-display-flex">
            <article>
                <header class="foodCard__header">
                    <h3 class="u-header" class="foodCard__heading">Peulvruchten</h3>
                </header>
                <section class="foodCard__progressSection">
                    <label class="foodCard__label" for="peulvruchten">{{ $user -> peulvruchten }} g / {{ $foods -> peulvruchten }} g</label>
                    <label class="foodCard__label" for="peulvruchten">{{ $foods -> peulvruchten - $user -> peulvruchten }} g te gaan!</label>
                    <progress id="vis" class="foodCard__progress" value="{{ $user -> peulvruchten }}" max="{{ $foods -> peulvruchten }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none foodCard u-display-flex">
            <article>
                <header class="foodCard__header">
                    <h3 class="u-header" class="foodCard__heading">Vlees</h3>
                </header>
                <section class="foodCard__progressSection">
                    <label class="foodCard__label" for="vlees">{{ $user -> vlees }} g / {{ $foods -> vlees }} g</label>
                    <label class="foodCard__label" for="vlees">{{ $foods -> vlees - $user -> vlees }} g te gaan!</label>
                    <progress id="vlees" class="foodCard__progress" value="{{ $user -> vlees }}" max="{{ $foods -> vlees }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none foodCard u-display-flex">
            <article>
                <header class="foodCard__header">
                    <h3 class="u-header" class="foodCard__heading">Ei</h3>
                </header>
                <section class="foodCard__progressSection">
                    <label class="foodCard__label" for="ei">{{ $user -> ei }} st / {{ $foods -> ei }} st</label>
                    <label class="foodCard__label" for="ei">{{ $foods -> ei - $user -> ei }} st te gaan!</label>
                    <progress id="ei" class="foodCard__progress" value="{{ $user -> ei }}" max="{{ $foods -> ei }}"></progress>
                </section>
            </article>
        </li>
    </ul>
@endsection