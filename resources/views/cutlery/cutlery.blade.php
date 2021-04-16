@extends('default')

@section('css')
    <link rel="stylesheet" href="/css/foods_cutlery.css">
@endsection

@section('js')
    <script src="/js/main.js" defer></script>
@endsection

@section('title')
    Tafel dekken
@endsection

@section('content')
    <article>
        @include('components.navigation')
    </article>
    <article class="cutlery">
        <figure class="cutlery__figure">
            <img class="cutlery__img" src="/img/etiquette2.jpg" alt="Etiquette">
            @include('cutlery.components.cutlery--identifiers')
        </figure>
        <section class="cutlery__name">
            @foreach($cutlery as $cutlery)
                @if($cutlery->scanned == true)
                    <p>{{ $cutlery->cutlery }}</p>
                @endif
            @endforeach
        </section>
        <section class="cutlery__list">
            <ol>
                <li>Brood bord</li>
                <li>Boter mes</li>
                <li>Kaart</li>
                <li>Koffie kopje</li>
                <li>Koffie schoteltje</li>
                <li>Dessert lepel</li>
            </ol>
            <ol start="7">
                <li>Dessert vork</li>
                <li>Water glas</li>
                <li>Rode wijn glas</li>
                <li>Champagne glas</li>
                <li>Witte wijn glas</li>
                <li>Sherry glas</li>                
            </ol>
            <ol start="13" class="cutlery__list__exception">
                <li>Servet</li>
                <li>Salade vork</li>
                <li>Vis vork</li>
                <li>Diner vork</li>
                <li>Diner bord</li>
                <li>Soep kom</li>                
            </ol>
            <ol start="19">
                <li>Salade bord</li>
                <li>Diner mes</li>
                <li>Salade mes</li>
                <li>Diner lepel</li>
                <li>Soep lepel</li>                
            </ol>
        </section>
        <form method="POST" action="/cutlery/reset">
            @csrf
            <input class="button" type="submit" value="Neergelegd">
        </form>
    </article>
@endsection