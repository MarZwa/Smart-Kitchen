@extends('default')

@section('title')
    Voedingsmiddelen {{$user->name}}
@endsection

@section('content')
    <h1 class="u-header">Voedingsmiddelen tracker</h1>
    <article class="buttonSection">
        <button class="buttonSection__button"><a href="/foods/{{ $user -> name }}">Overzicht</a></button>
        <button class="buttonSection__button"><a href="/foods/daily/{{ $user -> id }}">Dagelijks</a></button>
        <button class="buttonSection__button"><a href="/foods/weekly/{{ $user -> id }}">Dagelijks</a></button>
    </article>
    <ul class="u-grid-12 u-grid-gap-2 u-desktop-width">
        <li class="u-list-style-none foodCard u-display-flex">
            <article>
                <header class="foodCard__header">
                    <h3 class="u-header" class="foodCard__heading">Vis</h3>
                </header>
                <section class="foodCard__progressSection">
                <label class="foodCard__label" for="vis">{{ $user -> vis }} g / {{ $foods -> vis }} g</label>
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
                    <progress id="ei" class="foodCard__progress" value="{{ $user -> ei }}" max="{{ $foods -> ei }}"></progress>
                </section>
            </article>
        </li>
    </ul>
@endsection