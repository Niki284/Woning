@extends('layouts.app')

@section('content')
<div class="max__container">
<h1>Bouw Type</h1>
<ul class="list__render">
    @foreach ($bouwtypes as $type)
        <li class="list__render__item">
            <form method="post" action="/dashboard/bouwtype/update/{{$type->id}}">
            @csrf
            @method('put')
            <input type="text" name="name" value="{{$type->name}}" >
            <button type="submit" class="update-button">Update</button>

            </form>
            <form method="post" action="/dashboard/bouwtype/{{$type->id}}">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
        </li>
    @endforeach
</ul>

<div class="link__add">
    <a href="/dashboard/bouwtype/create">Voeg heer jou type</a>
    <a href="/dashboard">Ga terug </a>
</div>
</div>

@endsection