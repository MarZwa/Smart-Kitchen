@extends('default')

@section('content')
    <article class="profile-dashboard">
            <section class="dashboard">
            @include('users.components.dashboard--profile')
            </section>
            <section class="storage-heading">
                <h2>Voorraadlijst</h2>
            </section>
            <section class="storage-heading-grid">
                <section class="product-user-heading-product">
                    <p>Product</p>
                </section>
                <section class="product-user-heading-user">
                    <p>Wie</p>
                </section>
            </section>
            @foreach($storage as $storage)
            <section class="storage-info">
                <section class="storage-info-product">
                    <p>{{$storage->add_product_name}}</p>
                </section>
                <section class="storage-info-user">
                    <p>{{$storage->add_user_name}}</p>
                </section>
            </section>

            @endforeach
    </article>


@endsection