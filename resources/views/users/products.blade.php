@extends('default')

@section('css')
    @include('components.css_calorie_tracker')
@endsection

@section('js')
    @include('components.js_calorie_tracker')
@endsection

@section('content')
    <article class="profile-dashboard">
        <section class="dashboard">
            @include('components.dashboard-navigation')
        </section>

        <section class="products-section">
            <section class="products__filter-section">
                <select class="products__filter-section__select">
                    <option value="All">All</option>
                    <option value="Non-Alcohol">Non-Alcohol</option>            
                    <option value="Alcohol">Alcohol</option>  
                </select>
            </section> 
            <section class="product">
                <article>
                    <p class="product-value">Type</p>
                    <p class="product-value">Naam</p>
                    <p class="product-value">Calorieën</p>
                    <p class="product-value">Alcohol</p>
                    <p class="product-value">Datum</p>
                </article>
            </section>
            @include('users.components.productView')
        </section>
    </article>
@endsection