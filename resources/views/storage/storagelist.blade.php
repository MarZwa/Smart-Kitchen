@extends('default')

@section('content')
    <section class="main">
        <article class="profile-dashboard">
                <section class="dashboard">
                @include('users.components.navigation')
                </section>
                <section class="content">
                    <section class="storage-heading">
                        <h2>Voorraadlijst</h2>
                        <form class="create-form" action="/storage" method="post" enctype="multipart/form-data">
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
                    </section>
                    @if(count ($storage) != 0)
                        <section class="storage">
                            <section class="storage-heading-grid">
                                <section class="product-user-heading-product">
                                    <p>Product</p>
                                </section>
                                <section class="product-user-heading-user">
                                    <p>Wie</p>
                                </section>
                                <section class="product-user-heading-user">
                                    <p class="test">testje</p>
                                </section>
                            </section>
                        
                            <section class="storage-scroller">
                                @foreach($storage as $storage)
                                <section class="storage-info">
                                    <section class="storage-info-product">
                                        <p>{{$storage->add_product_name}}</p>
                                    </section>
                                    <section class="storage-info-user">
                                        <p>{{$storage->add_user_name}}</p>
                                    </section>
                                    <form class="storage-delete" action="/storage-delete/{{$storage->id}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input class="create-form__delButton" type="submit" value="Verwijder">
                                    </form>
                                </section>
                                @endforeach
                            </section>
                        @else
                            <section class="storage-none-yet">
                                <p class="storage-none-yet__p">Voeg je producten toe om een overzicht te krijgen!</p>
                            </section>
                        @endif
                    </section>
                </section>
        </article>
    </section>


@endsection