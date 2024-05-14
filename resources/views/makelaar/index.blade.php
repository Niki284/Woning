@extends('layouts.app')

@section('content')
<div class="max__container">
    <h1>Makelaar</h1>

<ul class="list__render list__render--makelaar">
    @foreach ($makelaar as $makelaare)
        <li class="list__render__item">
            <form method="post" action="/dashboard/makelaar/update/{{$makelaare->id}}" class="form__update">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name" class="form-label">Voornaam</label>
                    <input type="text" id="name" name="name" value="{{$makelaare->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="lastname" class="form-label">Achternaam</label>
                    <input type="text" id="lastname" name="lastname" value="{{$makelaare->lastname}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone" class="form-label">Telefoonnummer</label>
                    <input type="text" id="phone" name="phone" value="{{$makelaare->phone}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="reference" class="form-label">Referentie</label>
                    <input type="text" id="reference" name="reference" value="{{$makelaare->reference}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Afbeelding</label>
                    <img src="{{$makelaare->image}}" alt="Afbeelding van {{$makelaare->name}}" class="img-preview">
                    <input type="file" id="image" name="image" value="{{$makelaare->image}}" class="form-control-file">
                </div>
                <button type="submit" class="update-button">Update</button>
            </form>
            <form method="post" action="/dashboard/makelaar/{{$makelaare->id}}" class="form__delete">
                @csrf
                @method('delete')
                <button type="submit" class="delete-button">Delete</button>
            </form>
        </li>
    @endforeach
</ul>


<div class="link__add">
    <a href="/dashboard/makelaar/create">Add Makelaar</a>
    <a href="/dashboard">Ga terug </a>
</div>

</div>

@endsection