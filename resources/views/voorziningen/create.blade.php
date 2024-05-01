@extends('layouts.base')

@section('content')
<div class="forms">
    <div class="formmini">
        <h1>Voeg hier jouw voorziningen toe</h1>

        <form action="/dashboard/voorziningen/store" method="POST" class="form__categorie">
            @csrf

            <div class="form-group">
                <label for="voorziningen">voorzining</label>
                <input type="text" class="form-control" id="voorzining" name="voorzining" placeholder="Woning voorzining">
            </div>
            <button type="submit" class="form__categorie__btn">Add</button>

        </form>
    </div>
</div>



@endsection