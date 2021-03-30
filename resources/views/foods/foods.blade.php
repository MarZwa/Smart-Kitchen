<li class="u-list-style-none gridCard">
    <article>
        <header class="gridCard__header">
            <h1 class="gridCard__heading">{{$foods}}</h1>
        </header>
        <section class="gridCard__progressSection">
            <progress class="gridCard__progress" value="" max="{{ $foods -> value }}"></progress>
        </section>
    </article>
</li>