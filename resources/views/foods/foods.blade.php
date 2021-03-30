<li class="u-list-style-none gridCard">
    <article>
        <header class="gridCard__header">
            <h1 class="gridCard__heading">{{$food -> food}}</h1>
        </header>
        <section class="gridCard__progressSection">
            <progress class="gridCard__progress" value="{{ $user -> groente }}" max="{{ $food -> amount }}"></progress>
        </section>
    </article>
</li>