@section('css')
<link rel="stylesheet" href="css/cleaning.css">
@endsection
@section('script')
    <script src="js/cleaning.js" defer></script>
@endsection
@section('title', 'Cleaning Thuispagina')


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
                        </figure>
                        <h2>{{$latestEntry->task_name}}</h2>
                    </header>
                    <ul>
                        <li>{{$latestEntry->user_name}}</li>
                        <li>{{$latestEntry->finished_at}}</li>
                        <li>Elke {{$latestEntryTask['interval']}} dagen</li>
                        <li>{{$latestEntry->reminder}}</li>
                    </ul>
                </article>
            </li>
        </ul>

    </main>
    <footer>

    </footer>

