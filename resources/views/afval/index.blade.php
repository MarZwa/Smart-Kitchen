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
    <body>
        <article class="invoerVeld">
            <h1 class="invoerVeld__h1">Wat wil je weggooien?</h1>
            <input class="invoerVeld__text_input" type="text" name="invoerAfval" id="js--invoerAfval">
            <button class="invoerVeld__button" onclick="getInvoer({{$afval_naam}})">Gooi weg</button>
        </article>
        <article class="bakken">

        @if($status->status == 'Rest')
            <section class="bakken_card u-back-grey">
        @else
            <section class="bakken_card">
        @endif
                <figure class="bakken_card__fig">
                    <img class="bakken_card__img" src="/img/Vuilnisbak.webp" alt="Foto van een vuilnisbak">
                    <figcaption>Rest</figcaption>  
                </figure>
            </section>

        @if($vol_rest-> vol == 1)
            <section class="bakken_volCard u-back-grey">
                <p>De rest bak is vol {{ $user_rest->name }} moet hem legen</p>
            </section>
        @endif

        @if($status->status == 'Plastic')
            <section class="bakken_card u-back-orange">
        @else
            <section class="bakken_card">
        @endif
                <figure class="bakken_card__fig">
                    <img class="bakken_card__img" src="/img/Vuilnisbak.webp" alt="Foto van een vuilnisbak">
                    <figcaption>Plastic</figcaption>  
                </figure>
            </section>
        
        @if($vol_plastic-> vol == 1)
            <section class="bakken_volCard u-back-orange">
                <p>De plastic bak is vol {{ $user_plastic->name }} moet hem legen</p>
            </section>
        @endif

        @if($status->status == 'Gft')
            <section class="bakken_card u-back-green">
        @else
            <section class="bakken_card">
        @endif
                <figure class="bakken_card__fig">
                    <img class="bakken_card__img" src="/img/Vuilnisbak.webp" alt="Foto van een vuilnisbak">
                    <figcaption>Gft</figcaption>  
                </figure>
            </section>
        
        @if($vol_gft-> vol == 1)
            <section class="bakken_volCard u-back-green">
                <p>De gft bak is vol {{ $user_gft->name }} moet hem legen</p>
            </section>
        @endif
        </article>
    </body>
</html>