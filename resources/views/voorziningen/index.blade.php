@extends('layouts.base')

@section('content')

<ul class="list__render">
    @foreach ($voorziningen as $voorzining)
        <li class="list__render__item">
            <form method="post" action="/dashboard/voorziningen/update/{{$voorzining->id}}">
            @csrf
            @method('put')
            <input type="text" name="voorzining" value="{{$voorzining->voorzining}}">
            <button type="submit" class="update-button">Update</button>            </form>
        <form method="post" action="/dashboard/voorziningen/{{$voorzining->id}}">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
        </li>
    @endforeach
</ul>

<div class="link__add">
    <a href="/dashboard/voorziningen/create">Add Voorziningen</a>
</div>

@endsection