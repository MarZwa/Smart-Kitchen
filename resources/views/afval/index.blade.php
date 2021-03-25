<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/master.css">
    <title>Afval sorteren</title>
</head>
<body>
    <article class="soorteerVeld">
        <h1 class="soorteerVeld__h1">Voer in wat je weg wilt gooien:</h1>
        <input class="soorteerVeld__text_input" type="text" name="invoerAfval" id="js--invoerAfval">
        <button class="soorteerVeld__button" onclick="getInvoer({{$afval_naam}})">Dit wil ik weggeooien!</button>
        <section class="soorteerVeld__img_veld">
            <figure class="soorteerVeld__figure">
                @if($status->status == 'Rest')
                    <img class="soorteerVeld__bak_imgblur" src="/img/Vuilnisbak.png" alt="Deze vuilnisbak staat uit">
                @else
                    <img class="soorteerVeld__bak_img" src="/img/Vuilnisbak.png" alt="Deze vuilnisbak staat aan">  
                @endif 
                <figcaption>Rest afval</figcaption>
            </figure>
            <figure class="soorteerVeld__figure">
                @if($status->status == 'Plastic')
                <img class="soorteerVeld__bak_imgblur" src="/img/Vuilnisbak.png" alt="Deze vuilnisbak staat uit">
                @else
                    <img class="soorteerVeld__bak_img" src="/img/Vuilnisbak.png" alt="Deze vuilnisbak staat aan">  
                @endif 
                <figcaption>Platic afval</figcaption>
            </figure>
            <figure class="soorteerVeld__figure">
                @if($status->status == 'Gft')
                <img class="soorteerVeld__bak_imgblur" src="/img/Vuilnisbak.png" alt="Deze vuilnisbak staat uit">
                @else
                    <img class="soorteerVeld__bak_img" src="/img/Vuilnisbak.png" alt="Deze vuilnisbak staat aan">  
                @endif 
                <figcaption>Gft afval</figcaption>
            </figure>
        </section>
    </article>
</body>
<script src="/js/main.js"></script>
</html>