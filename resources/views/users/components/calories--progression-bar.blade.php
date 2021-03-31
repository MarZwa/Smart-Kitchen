<section class="progression-bar">
    <section class="progression-bar__heading">
        <h3>Calories</h3>
        <p>Calorie consumption</p>
    </section>
    <section class="progression-bar__bar">
        <section class="progression-bar__text">
            <p class="u-text-big">{{$user->current_calories}}</p>
            <p>/{{$user->calories}} <i class="fas fa-utensils"></i></p>
        </section>
        <circular-progression-bar class="u-z-1" stroke="20" radius="150" color="#7FCD91" curVal="{{$user->current_calories}}" maxVal="{{$user->calories}}"></circular-progression-bar>
        <circular-progression-bar class="u-pos-abs" stroke="20" radius="150" color="#CFD8DC" curVal="{{$user->calories}}" maxVal="{{$user->calories}}"></circular-progression-bar>
    </section>
</section>