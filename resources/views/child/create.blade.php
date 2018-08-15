@extends('layouts.default')

@section('main')
    <div class="article">
        <form class="form" action="{{action('ChildController@store')}}" method="post">
            {{ csrf_field() }}
            <div class="form__field">
                <label class="form__label">Vorname</label>
                <input class="form__input" type="text" name="first_name" required>
            </div>
            <div class="form__field">
                <label class="form__label">Nachname</label>
                <input class="form__input" type="text" name="last_name" required>
            </div>
            <div class="form__field">
                <label class="form__label">Patenschaft</label>
                <div class="form__select-wrap">
                    <select class="form__select" name="godparenthood_id">
                        @foreach($godparenthoods as $godparenthood)
                            <option value="{{ $godparenthood->id }}">{{ $godparenthood->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr class="divider">
            <div class="form__field">
                <label class="form__label">Einzahlung</label>
                <input class="form__input" type="number" name="first_deposit" step="0.10" required autocomplete="off" value="0">
            </div>
            <button type="submit" class="button button--primary button--without-icon">Erstellen</button>
        </form>
    </div>
@endsection
