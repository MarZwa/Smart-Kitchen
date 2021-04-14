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
                    <h2>Gescande non-alcoholische producten van vandaag</h2>
                    <ul class="product-wrapper no-scroll-wrapper">
                        @if(!empty($products))
                            @foreach ($products as $product)
                                @if($product->alcohol == 0)
                                    @include('users.components.productUsage--calories')
                                @endif
                            @endforeach
                        @else
                            <p>Er zijn nog geen non-alcoholische producten gescanned</p>
                        @endif
                    </ul>
                </section>
            </section>
            <section class="dashboard-content__section">
                @include('users.components.alcohol--progression-bar')
                <section class="dashboard-content__section__sub-section">
                    <h2>Gescande alcoholische producten van vandaag</h2>
                    <ul class="product-wrapper no-scroll-wrapper">
                        @if(empty($products))
                            @foreach ($products as $product)
                                @if($product->alcohol != 0)
                                    @include('users.components.productUsage--alcohol')
                                @endif
                            @endforeach
                        @else
                            <p>Er zijn nog geen alcohol houdende producten gescanned</p>
                        @endif
                    </ul>
                </section>
            </section>
    </article>
@endsection