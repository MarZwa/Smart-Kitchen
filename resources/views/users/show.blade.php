@extends('default')

@section('content')
    <article class="profile-dashboard">
        <section class="dashboard">
        @include('users.components.dashboard--profile')
        </section>

        <section class="dashboard-content">
            <section class="dashboard-content__section">
                @include('users.components.calories--progression-bar')
                <section class="dashboard-content__section__sub-section">
                    <h2>Todays Food or Non Alcoholic beverages</h2>
                    <ul class="product-wrapper">
                        @foreach ($products as $product)
                            @if($product->alcohol == 0)
                                @include('users.components.productUsage--calories')
                            @endif
                        @endforeach
                    </ul>
                </section>
            </section>
            <section class="dashboard-content__section">
                @include('users.components.alcohol--progression-bar')
                <section class="dashboard-content__section__sub-section">
                    <h2>Todays Food or Non Alcoholic beverages</h2>
                    <ul class="product-wrapper">
                        @foreach ($products as $product)
                            @if($product->alcohol != 0)
                                @include('users.components.productUsage--alcohol')
                            @endif
                        @endforeach
                    </ul>
                </section>
            </section>
    </article>
@endsection