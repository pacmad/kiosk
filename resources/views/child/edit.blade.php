@extends('layouts.default')

@section('main')
    <div class="article">
        <form class="form" action="{{action('ChildController@update', ['child' => $child])}}" method="post">
            {{ csrf_field() }}
            <div class="form__field">
                <label class="form__label">Vorname</label>
                <input class="form__input" type="text" name="first_name" value="{{$child->first_name}}" required>
            </div>
            <div class="form__field">
                <label class="form__label">Nachname</label>
                <input class="form__input" type="text" name="last_name" value="{{$child->last_name}}" required>
            </div>
            <div class="form__field">
                <label class="form__label">Patenschaft</label>
                <div class="form__select-wrap">
                    <select class="form__select" name="godparenthood_id">
                        @foreach($godparenthoods as $godparenthood)
                            <option value="{{ $godparenthood->id }}" @if($godparenthood->id === $child->godparenthood->id) selected @endif>{{ $godparenthood->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="button button--primary button--without-icon">Speichern</button>
        </form>
    </div>
@endsection
