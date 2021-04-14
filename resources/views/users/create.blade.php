@extends('default')

@section('content')
    <article class="create-page">
        <section class="create-page__body">
            <h2>Profiel Aanmaken</h2>
        </section>
        <section class="create-page__form">
            <form method='post' action="/user" enctype="multipart/form-data">
                @method('POST')
                @csrf

                <section class="create-page__form-section">
                    <label for="name"> Naam </label>
                    <input class="create-page__form__input" name="name" id="name" type="text"></input>
                </section>

                <section class="create-page__form-section">
                    <label for="rfid"> RFID (No spaces or ':') </label>
                    <input class="create-page__form__input" name="rfid" id="rfid" type="text" placeholder="AABBCCDD"></input>
                </section>

                <section class="create-page__form-section">
                    <label for="image"> Profiel Foto </label>
                    <input class="create-page__form__file" name="image" id="image" type="file"></input>
                </section>

                <section class="create-page__form-section">
                    <label for="calories"> Calories </label>
                    <input class="create-page__form__input" name="calories" id="calories" type="number"></input>
                </section>

                <section class="create-page__form-section">
                    <label for="alcohol"> Alcohol </label>
                    <input class="create-page__form__input" name="alcohol" id="alcohol" type="number"></input>
                </section>

                <section class="create-page__form-buttons create-page__buttons">
                    <a class="button secondary" href="/users">Cancel</a>
                    <input class="button" type="submit" value="Aanmaken">
                </section>
            </form>
        </section>    
    </article>
@endsection