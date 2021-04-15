@section('css')
<link rel="stylesheet" href="css/cleaning.css">
@endsection
@section('script')
    <script src="js/cleaning.js" defer></script>
@endsection
@section('title', 'Cleaning Thuispagina')

<body>
    <header class="page-header">
        <a href="/" class="page-header__back-to-home">
            <h1 class="pageheader__heading">
                Smart Kitchen
            </h1>
        </a>
    </header>
    <main class="cleaning">
        <ul class="cleaning__cards">
            <li>
                <article class="cleaning__card">
                    <header class="cleaning__heading">
                        <figure>
                            <img src="{{$latestEntry['task']}} alt="Icoon die {{$latestEntry->task_name}} illustreert.">
                        </figure>
                        <h2>{{$latestEntry->task_name}}</h2>
                    </header>
                    <ul>
                        <li>{{$latestEntry->user_name}}</li>
                        <li>{{$latestEntry->finished_at}}</li>
                        <li>Elke {{$latestEntry['task']->frequency}} dagen</li>
                        <li>{{$latestEntry->reminder}}</li>
                    </ul>
                </article>
            </li>
            <li>
                <article>
                    <header>

                    </header>
                    <section>

                    </section>
                </article>
            </li>
        </ul>

    </main>
    <footer>

    </footer>
</body>
</html>