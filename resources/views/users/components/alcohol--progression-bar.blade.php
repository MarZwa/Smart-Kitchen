<article class="progression-bar">
    <section class="progression-bar__heading">
        <h3>Alcohol</h3>
        <p>Alcohol consumption</p>
    </section>
    <section class="progression-bar__bar">
        <section class="progression-bar__text">
            <p class="u-text-big">{{$user->current_alcohol}}</p>
            <p>/{{$user->alcohol}} <i class="fas fa-beer"></i></i></p>
        </section>
        <circular-progression-bar class="u-z-1" stroke="20" radius="120" color="#7FCD91" curVal="{{$user->current_alcohol}}" maxVal="{{$user->alcohol}}"></circular-progression-bar>
        <circular-progression-bar class="u-pos-abs" stroke="20" radius="120" color="#CFD8DC" curVal="{{$user->alcohol}}" maxVal="{{$user->alcohol}}"></circular-progression-bar>
    </section>
</article>