@extends('default')

@section('title')
    {{'Voedingsmiddelen'}}
@endsection

@section('content')
    <ul class="u-grid-12 u-grid-gap-2">
        <li class="u-list-style-none gridCard">
            <article>
                <header class="gridCard__header">
                    <h1 class="gridCard__heading">Groente</h1>
                </header>
                <section class="gridCard__progressSection">
                    <progress class="gridCard__progress" value="{{ $user -> groente }}" max="{{ $foods -> groente }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none gridCard">
            <article>
                <header class="gridCard__header">
                    <h1 class="gridCard__heading">Fruit</h1>
                </header>
                <section class="gridCard__progressSection">
                    <progress class="gridCard__progress" value="{{ $user -> fruit }}" max="{{ $foods -> fruit }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none gridCard">
            <article>
                <header class="gridCard__header">
                    <h1 class="gridCard__heading">Brood</h1>
                </header>
                <section class="gridCard__progressSection">
                    <progress class="gridCard__progress" value="{{ $user -> brood }}" max="{{ $foods -> brood }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none gridCard">
            <article>
                <header class="gridCard__header">
                    <h1 class="gridCard__heading">Graanproducten en aardappelen</h1>
                </header>
                <section class="gridCard__progressSection">
                    <progress class="gridCard__progress" value="{{ $user -> aardappelen }}" max="{{ $foods -> aardappelen }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none gridCard">
            <article>
                <header class="gridCard__header">
                    <h1 class="gridCard__heading">Vis</h1>
                </header>
                <section class="gridCard__progressSection">
                    <progress class="gridCard__progress" value="{{ $user -> vis }}" max="{{ $foods -> vis }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none gridCard">
            <article>
                <header class="gridCard__header">
                    <h1 class="gridCard__heading">Peulvruchten</h1>
                </header>
                <section class="gridCard__progressSection">
                    <progress class="gridCard__progress" value="{{ $user -> peulvruchten }}" max="{{ $foods -> peulvruchten }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none gridCard">
            <article>
                <header class="gridCard__header">
                    <h1 class="gridCard__heading">Vlees</h1>
                </header>
                <section class="gridCard__progressSection">
                    <progress class="gridCard__progress" value="{{ $user -> vlees }}" max="{{ $foods -> vlees }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none gridCard">
            <article>
                <header class="gridCard__header">
                    <h1 class="gridCard__heading">Ei</h1>
                </header>
                <section class="gridCard__progressSection">
                    <progress class="gridCard__progress" value="{{ $user -> ei }}" max="{{ $foods -> ei }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none gridCard">
            <article>
                <header class="gridCard__header">
                    <h1 class="gridCard__heading">Noten</h1>
                </header>
                <section class="gridCard__progressSection">
                    <progress class="gridCard__progress" value="{{ $user -> noten }}" max="{{ $foods -> noten }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none gridCard">
            <article>
                <header class="gridCard__header">
                    <h1 class="gridCard__heading">Melk en melkproducten</h1>
                </header>
                <section class="gridCard__progressSection">
                    <progress class="gridCard__progress" value="{{ $user -> melk }}" max="{{ $foods -> melk }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none gridCard">
            <article>
                <header class="gridCard__header">
                    <h1 class="gridCard__heading">Kaas</h1>
                </header>
                <section class="gridCard__progressSection">
                    <progress class="gridCard__progress" value="{{ $user -> kaas }}" max="{{ $foods -> kaas }}"></progress>
                </section>
            </article>
        </li>

        <li class="u-list-style-none gridCard">
            <article>
                <header class="gridCard__header">
                    <h1 class="gridCard__heading">Smeer- en bereidingsvetten</h1>
                </header>
                <section class="gridCard__progressSection">
                    <progress class="gridCard__progress" value="{{ $user -> vetten }}" max="{{ $foods -> vetten }}"></progress>
                </section>
            </article>
        </li>
    </ul>
@endsection