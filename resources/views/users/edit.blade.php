@extends('default')

@section('content')
    <article class="update-page">
        <section class="update-page__body">
            <h2>Verander dagelijkse doelen</h2>
        </section>
        <section class="update-page__form">
            <form method='post' action="/user/{{$user->id}}/update" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

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
                    <input class="button" type="submit" value="Update">
                </section>
            </form>
        </section>    
    </article>
@endsection