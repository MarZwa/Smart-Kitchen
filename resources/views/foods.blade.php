@extends('default')

@section('title')
    {{'Voedingsmiddelen'}}
@endsection

@section('content')
    <h1 class="u-header">Voedingsmiddelen tracker</h1>
    <ul class="u-grid-12 u-grid-gap-2 u-desktop-width">
        <li class="u-list-style-none foodCard u-display-flex">
            <article>
                <header class="foodCard__header">
                    <h2 class="u-header" class="foodCard__heading">Groente</h2>
                </header>
                <section class="foodCard__progressSection">
                    <label class="foodCard__label" for="groente">{{ $user -> groente }} g / {{ $foods -> groente }} g</label>
                    <progress id="groente" class="foodCard__progress" value="{{ $user -> groente }}" max="{{ $foods -> groente }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none foodCard u-display-flex">
            <article>
                <header class="foodCard__header">
                    <h2 class="u-header" class="foodCard__heading">Fruit</h2>
                </header>
                <section class="foodCard__progressSection">
                <label class="foodCard__label" for="fruit">{{ $user -> fruit }} g / {{ $foods -> fruit }} g</label>
                    <progress id="fruit" class="foodCard__progress" value="{{ $user -> fruit }}" max="{{ $foods -> fruit }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none foodCard u-display-flex">
            <article>
                <header class="foodCard__header">
                    <h2 class="u-header" class="foodCard__heading">Brood</h2>
                </header>
                <section class="foodCard__progressSection">
                <label class="foodCard__label" for="brood">{{ $user -> brood }} st / {{ $foods -> brood }} st</label>
                    <progress id="brood" class="foodCard__progress" value="{{ $user -> brood }}" max="{{ $foods -> brood }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none foodCard u-display-flex">
            <article>
                <header class="foodCard__header">
                    <h2 class="u-header" class="foodCard__heading">Graanproducten en aardappelen</h2>
                </header>
                <section class="foodCard__progressSection">
                    <label for=""></label>
                <label class="foodCard__label" for="aardappelen">{{ $user -> aardappelen }} g / {{ $foods -> aardappelen }} g</label>
                    <progress id="aardappelen" class="foodCard__progress" value="{{ $user -> aardappelen }}" max="{{ $foods -> aardappelen }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none foodCard u-display-flex">
            <article>
                <header class="foodCard__header">
                    <h2 class="u-header" class="foodCard__heading">Vis</h2>
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
                    <h2 class="u-header" class="foodCard__heading">Peulvruchten</h2>
                </header>
                <section class="foodCard__progressSection">
                <label class="foodCard__label" for="peulvruchten">{{ $user -> peulvruchten }} g / {{ $foods -> peulvruchten }} g</label>
                    <progress id="peulvruchten" class="foodCard__progress" value="{{ $user -> peulvruchten }}" max="{{ $foods -> peulvruchten }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none foodCard u-display-flex">
            <article>
                <header class="foodCard__header">
                    <h2 class="u-header" class="foodCard__heading">Vlees</h2>
                </header>
                <section class="foodCard__progressSection">
                <label class="foodCard__label" for="vlees">{{ $user -> vlees }} g / {{ $foods -> vlees }} g</label>
                    @if($user -> vlees == $foods -> vlees)
                        <progress id="vlees" class="foodCard__progress foodCard__progress--max" value="{{ $user -> vlees }}" max="{{ $foods -> vlees }}"></progress>
                    @elseif( $user -> vlees > $foods -> vlees)
                        <progress id="vlees" class="foodCard__progress foodCard__progress--tooMuch" value="{{ $user -> vlees }}" max="{{ $foods -> vlees }}"></progress>
                    @else
                        <progress id="vlees" class="foodCard__progress" value="{{ $user -> vlees }}" max="{{ $foods -> vlees }}"></progress>
                    @endif
                </section>
            </article>
        </li>

        <li class="u-list-style-none foodCard u-display-flex">
            <article>
                <header class="foodCard__header">
                    <h2 class="u-header" class="foodCard__heading">Ei</h2>
                </header>
                <section class="foodCard__progressSection">
                <label class="foodCard__label" for="ei">{{ $user -> ei }} st / {{ $foods -> ei }} st</label>
                    <progress id="ei" class="foodCard__progress" value="{{ $user -> ei }}" max="{{ $foods -> ei }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none foodCard u-display-flex">
            <article>
                <header class="foodCard__header">
                    <h2 class="u-header" class="foodCard__heading">Noten</h2>
                </header>
                <section class="foodCard__progressSection">
                <label class="foodCard__label" for="noten">{{ $user -> noten }} g / {{ $foods -> noten }} g</label>
                    <progress id="noten" class="foodCard__progress" value="{{ $user -> noten }}" max="{{ $foods -> noten }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none foodCard u-display-flex">
            <article>
                <header class="foodCard__header">
                    <h2 class="u-header" class="foodCard__heading">Melk en melkproducten</h2>
                </header>
                <section class="foodCard__progressSection">
                <label class="foodCard__label" for="melk">{{ $user -> melk }} g / {{ $foods -> melk }} g</label>
                    <progress id="melk" class="foodCard__progress" value="{{ $user -> melk }}" max="{{ $foods -> melk }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none foodCard u-display-flex">
            <article>
                <header class="foodCard__header">
                    <h2 class="u-header" class="foodCard__heading">Kaas</h2>
                </header>
                <section class="foodCard__progressSection">
                <label class="foodCard__label" for="kaas">{{ $user -> kaas }} g / {{ $foods -> kaas }} g</label>
                    <progress id="kaas" class="foodCard__progress" value="{{ $user -> kaas }}" max="{{ $foods -> kaas }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none foodCard u-display-flex">
            <article>
                <header class="foodCard__header">
                    <h2 class="u-header" class="foodCard__heading">Smeer- en bereidingsvetten</h2>
                </header>
                <section class="foodCard__progressSection">
                    <label class="foodCard__label" for="vetten">{{ $user -> vetten }} g / {{ $foods -> vetten }} g</label>
                    <progress id="vetten" class="foodCard__progress" value="{{ $user -> vetten }}" max="{{ $foods -> vetten }}"></progress>
                </section>
            </article>
        </li>
    </ul>
@endsection