@extends('default')

@section('content')
    <section class="redirect-page">
        <section class="redirect-page__body">
            <h2>Profiel verwijderen</h2>
        </section>
        <section class="redirect-page__buttons">
            
            <form method="post" action="/delete">
                @method('DELETE')
                @csrf
                <section class="redirect-page__form-section">
                    <label for="name"> Vul "{{$user->name}}"in ter comfirmatie </label>
                    <input class="redirect-page__form__input" name="name" id="name" type="text"></input>
                </section>
                
                <section class="redirect-page__form-buttons redirect-page__buttons">
                    <a class="button secondary" href="/users/{{$user->id}}">Cancel</a>
                    <input class="button" type="submit" value="Verwijder">
                </section>
            </form>
        </section> 
    </section>
@endsection