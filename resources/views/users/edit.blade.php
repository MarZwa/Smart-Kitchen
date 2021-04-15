@extends('default')

@section('css')
    @include('components.css_calorie_tracker')
@endsection

@section('js')
    @include('components.js_calorie_tracker')
@endsection

@section('content')
    <article class="update-page">
        <section class="update-page__body">
            <h2>Profiel Aanpassen</h2>
        </section>
        <section class="update-page__form">
            <form method='post' action="/user/{{$user->id}}/update" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                <section class="update-page__form-section">
                    <label for="name"> Naam </label>
                    <input class="update-page__form__input" name="name" id="name" type="text" value="{{$user->name}}"></input>
                </section>

                <section class="update-page__form-section">
                    <label for="rfid"> RFID (No spaces or ':') </label>
                    <input class="update-page__form__input" name="rfid" id="rfid" type="text" value="{{$user->rfid}}"></input>
                </section>

                <section class="update-page__form-section">
                    <label for="image"> Profiel Foto </label>
                    <input class="update-page__form__file" name="image" id="image" type="file" value="{{$user->image}}"></input>
                </section>

                <section class="update-page__form-section">
                    <label for="calories"> Calories </label>
                    <input class="update-page__form__input" name="calories" id="calories" type="number" value="{{$user->calories}}"></input>
                </section>

                <section class="update-page__form-section">
                    <label for="alcohol"> Alcohol </label>
                    <input class="update-page__form__input" name="alcohol" id="alcohol" type="number" value="{{$user->alcohol}}"></input>
                </section>

                <section class="update-page__form-buttons update-page__buttons">
                    <a class="button secondary" href="/users/{{$user->id}}">Cancel</a>
                    <input class="button" type="submit" value="Aanpassen">
                </section>
            </form>
        </section>    
    </article>
@endsection