@extends('default')

@section('content')
    <article class="profile-dashboard">
        <section class="dashboard">
            @include('users.components.dashboard--profile')
        </section>

        <section class="products-section">
            <section class="product">
                <article>
                    <p class="product-value">Type</p>
                    <p class="product-value">Name</p>
                    <p class="product-value">Calories</p>
                    <p class="product-value">Alcohol</p>
                    <p class="product-value">Date</p>
                </article>
            </section>
            @include('users.components.productView')
        </section>
    </article>
@endsection