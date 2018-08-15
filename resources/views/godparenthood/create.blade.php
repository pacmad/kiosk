@extends('layouts.default')

@section('main')
    <div class="article">
        <form class="form" action="{{action('GodparenthoodController@store')}}" method="post">
            {{ csrf_field() }}
            <div class="form__field">
                <label class="form__label">Name</label>
                <input class="form__input" type="text" name="title" required>
            </div>
            <button class="button button--primary button--without-icon" type="submit">Erstellen</button>
        </form>
    </div>
@endsection
