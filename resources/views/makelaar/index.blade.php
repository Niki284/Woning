@extends('layouts.base')

@section('content')

<ul class="list__render">
    @foreach ($makelaar as $makelaare)
        <li class="list__render__item">
            <form method="post" action="/dashboard/makelaar/update/{{$makelaare->id}}">
            @csrf
            @method('put')
            <input type="text" name="name" value="{{$makelaare->name}}">


            <input type="text" name="lastname" value="{{$makelaare->lastname}}">
            <input type="text" name="phone" value="{{$makelaare->phone}}">

            <input type="text" name="reference" value="{{$makelaare->reference}}">
            <input type="file" name="image" value="{{$makelaare->image}}">

            <button type="submit" class="update-button">Update</button>            </form>
        <form method="post" action="/dashboard/makelaar/{{$makelaare->id}}">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
        </li>
    @endforeach
</ul>

<div class="link__add">
    <a href="/dashboard/makelaar/create">Add Makelaar</a>
    <a href="/dashboard">Ga terug </a>
</div>

@endsection