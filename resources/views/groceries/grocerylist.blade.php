@extends('default')
@section('css')
    <link rel="stylesheet" href="/css/voorraad.css">
@endsection
@section('js')
    <script src="/js/main.js" defer></script>
@endsection


@section('content')
<article class="profile-dashboard">
        <section class="dashboard">
            @include('users.components.navigation')
        </section>
        <section class="content">
            <section class="grocery-heading">
                <h2>Boodschappenlijst</h2>
                <form class="create-form" action="/grocery" method="post" enctype="multipart/form-data">

                    @csrf
    
                    <section class="create-form__section">
                        <label class="create-form__label" for="productname">Product naam</label>
                        <input class="create-form__input" type="text" name="productname" id="productname" required>
                    </section>
    
                    <section class="create-form__section">
                        <label class="create-form__label" for="username">Jouw naam</label>
                        <input class="create-form__input" type="text" name="username" id="username" required>
                    </section>
    
                    <section class="create-form__btnSection">
                        <button class="create-form__button" type="submit">Zet op lijst</button>
                    </section>
                </form>
                <form action="/grocery-clear" method="post">
                    @method('DELETE')
                    @csrf
                    <input class="grocery__delButton" type="submit" value="Leeg lijst">
                </form>
            </section>

            @if(count($groceries) != 0)
                <section class="grocery">
                    <section class="grocery-heading-grid">
                        <section class="product-user-heading-product">
                            <p>Product</p>
                        </section>
                        <section class="product-user-heading-user">
                            <p>Wie</p>
                        </section>
                    </section>
                    <section class="grocery-scroller">
                        @foreach($groceries as $grocery)
                            <section class="grocery-info">
                                <section class="grocery-info-product">
                                    <p>{{$grocery->empty_product_name}}</p>
                                </section>
                                <section class="grocery-info-user">
                                    <p>{{$grocery->empty_user_name}}</p>
                                </section>
                            </section>
                        @endforeach
                    </section>
                @else
                    <section class="grocery-none-yet">
                        <p class="grocery-none-yet__p">Voeg je producten toe om een overzicht te krijgen!</p>
                    </section>
                @endif 
            </section>
        </section>            
    </article>


@endsection