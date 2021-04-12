@extends('default')

@section('title')
    Tafel dekken
@endsection

@section('content')
    <article class="cutlery">
        <figure class="cutlery__figure">
            <img class="cutlery__img" src="/img/etiquette2.jpg" alt="Etiquette">
            @foreach( $cutlery as $cutlery)
                @if($cutlery->cutlery == 'Brood bord' and $cutlery->scanned == true)
                    <span id="cutlery1" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Boter mes' and $cutlery->scanned == true)
                    <span id="cutlery2" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Kaart' and $cutlery->scanned == true)
                    <span id="cutlery3" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Koffie kopje' and $cutlery->scanned == true)
                    <span id="cutlery4" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Koffie schoteltje' and $cutlery->scanned == true)
                    <span id="cutlery5" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Dessert lepel' and $cutlery->scanned == true)
                    <span id="cutlery6" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Dessert vork' and $cutlery->scanned == true)
                    <span id="cutlery7" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Water glas' and $cutlery->scanned == true)
                    <span id="cutlery8" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Rode wijn glas' and $cutlery->scanned == true)
                    <span id="cutlery9" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Champagne glas' and $cutlery->scanned == true)
                    <span id="cutlery10" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Witte wijn glas' and $cutlery->scanned == true)
                    <span id="cutlery11" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Sherry glas' and $cutlery->scanned == true)
                    <span id="cutlery12" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Servet' and $cutlery->scanned == true)
                    <span id="cutlery13" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Salade vork' and $cutlery->scanned == true)
                    <span id="cutlery14" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Vis vork' and $cutlery->scanned == true)
                    <span id="cutlery15" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Diner vork' and $cutlery->scanned == true)
                    <span id="cutlery16" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Diner bord' and $cutlery->scanned == true)
                    <span id="cutlery17" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Soep kom' and $cutlery->scanned == true)
                    <span id="cutlery18" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Salade bord' and $cutlery->scanned == true)
                    <span id="cutlery19" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Diner mes' and $cutlery->scanned == true)
                    <span id="cutlery20" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Salade mes' and $cutlery->scanned == true)
                    <span id="cutlery21" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Diner lepel' and $cutlery->scanned == true)
                    <span id="cutlery22" class="cutlery__cirkle"></span>
                @endif
                @if($cutlery->cutlery == 'Soep lepel' and $cutlery->scanned == true)
                    <span id="cutlery23" class="cutlery__cirkle"></span>
                @endif
            @endforeach
        </figure>
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
                <li>Dinner vork</li>
                <li>Dinner bord</li>
                <li>Soep kom</li>                
            </ol>
            <ol start="19">
                <li>Salade bord</li>
                <li>Dinner mes</li>
                <li>Salade mes</li>
                <li>Dinner lepel</li>
                <li>Soep lepel</li>                
            </ol>
        </section>
        <form method="POST" action="/cutlery/reset">
            @csrf
            <input class="button" type="submit" value="Neergelegd">
        </form>
    </article>
@endsection