<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/master.css">
        <script src="/js/main.js" defer></script>
        <title>Afval sorteren</title>
    </head>
    <body onload="getDay('{{$user_een->ophaal_dag}}')">

        <article class="datumVeld" id="js--datumVeld">
            @if($user_een->ophaal_dag == Null)
                <h1 class="datumVeld__h1" id="js--datumVeld__h1">Op welke dag wordt het vuilnis opgehaald?</h1>
                <input class="datumVeld__text_input" type="text" id="js--dagInvoer">
                <button class="datumVeld__button" onclick="setDag()">Dit is de dag</button>
            @else
            <h1 class="datumVeld__h1" id="js--datumVeld__h1">Het vuilnis wordt {{$user_een->ophaal_dag}} opgehaald</h1>
            @endif
        </article>

        <article class="invoerVeld">
            <h1 class="invoerVeld__h1">Wat wil je weggooien?</h1>
            <input class="invoerVeld__text_input" type="text" name="invoerAfval" id="js--invoerAfval">
            <button class="invoerVeld__button" onclick="getInvoer({{$afval_naam}})">Gooi weg</button>
        </article>

        <article class="bakken">

        <section>
            @if($status->status == 'Rest')
                <article class="bakken_card u-back-grey">
            @else
                <article class="bakken_card">
            @endif
                    <figure class="bakken_card__fig">
                        <img class="bakken_card__img" src="/img/Vuilnisbak.webp" alt="Foto van een vuilnisbak">
                        <figcaption>Rest</figcaption>  
                    </figure>
                </article>

            @if($vol_rest-> vol == 1)
                <article class="bakken_volCard u-back-grey">
                    <p>De rest bak is vol {{ $user_rest->name }} moet hem legen</p>
                </article>
            @endif
        </section>

        <section>
            @if($status->status == 'Plastic')
                <article class="bakken_card u-back-orange">
            @else
                <article class="bakken_card">
            @endif
                    <figure class="bakken_card__fig">
                        <img class="bakken_card__img" src="/img/Vuilnisbak.webp" alt="Foto van een vuilnisbak">
                        <figcaption>Plastic</figcaption>  
                    </figure>
                </article>
            
            @if($vol_plastic-> vol == 1)
                <article class="bakken_volCard u-back-orange">
                    <p>De plastic bak is vol {{ $user_plastic->name }} moet hem legen</p>
                </article>
            @endif
        </section>

        <section>
            @if($status->status == 'Gft')
                <article class="bakken_card u-back-green">
            @else
                <article class="bakken_card">
            @endif
                    <figure class="bakken_card__fig">
                        <img class="bakken_card__img" src="/img/Vuilnisbak.webp" alt="Foto van een vuilnisbak">
                        <figcaption>Gft</figcaption>  
                    </figure>
                </article>
            
            @if($vol_gft-> vol == 1)
                <article class="bakken_volCard u-back-green">
                    <p>De gft bak is vol {{ $user_gft->name }} moet hem legen</p>
                </article>
            @endif
        </section>

        </article>
    </body>
</html>