@extends('layouts.base')

@section('content')
<div class="forms">
    <div class="formmini">
        <h1>Voeg hier jouw woning type toe</h1>

        <form action="/dashboard/nieuwtype/store" method="POST" class="form__categorie">
            @csrf 
            <div class="form-group">
                <label for="name">Nieu type</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nieuw Type">
            </div>
            <button type="submit" class="form__categorie__btn">Add</button>

        </form>
    </div>
</div>



@endsection