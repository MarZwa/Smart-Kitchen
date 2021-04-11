@extends('default')

@section('content')
    <article class="profile-dashboard">
            <section class="dashboard">
            @include('users.components.dashboard--profile')
            </section>
            <section class="grocery-heading">
                <h2>Boodschappenlijst</h2>
            </section>
            <section class="grocery-heading-grid">
                <section class="product-user-heading-product">
                    <p>Product</p>
                </section>
                <section class="product-user-heading-user">
                    <p>Wie</p>
                </section>
            </section>
            @foreach($groceries as $grocery)
            <section class="grocery-info">
            <section class="grocery-info-product">
                    <p>{{$grocery->product_name}}</p>
                </section>
                <section class="grocery-info-user">
                    <p>{{$grocery->user_name}}</p>
                </section>
            </section>

            @endforeach
    </article>


@endsection