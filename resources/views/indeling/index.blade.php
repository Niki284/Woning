@extends('layouts.app')

@section('content')

<div class="forms">
    <div class="formmini">
        <h1>Indelings</h1>

        <ul class="list__render list__render--flex">
            @foreach ($indeling as $indeling)
                <li class="list__render__item">
                   
                    <form method="post" action="/dashboard/indeling/update/{{$indeling->id}}">
                    @csrf
                    @method('put')
                    
            <div class="form-group">
                <label for="badkamer">Badkamer</label>
                <input type="number" class="form-control" id="badkamer" name="badkamer" value="{{$indeling->badkamer}}">
            </div>
            
            <div class="form-group">
                <label for="berging">Berging</label>
                <input type="number" class="form-control" id="berging" name="berging" value="{{$indeling->berging}}">
            </div>

            <div class="form-group">
                <label for="bureau">Bureau</label>
                <input type="number" class="form-control" id="bureau" name="bureau" value="{{$indeling->bureau}}">
            </div>

            <div class="form-group">
                <label for="garage">Garage</label>
                <input type="number" class="form-control" id="garage" name="garage" value="{{$indeling->garage}}">
            </div>

            <div class="form-group">
                <label for="keuken">Keuken</label>
                <input type="number" class="form-control" id="keuken" name="keuken" value="{{$indeling->keuken}}">
            </div>

            <div class="form-group">
                <label for="living">Living</label>
                <input type="number" class="form-control" id="living" name="living" value="{{$indeling->living}}">
            </div>

            <div class="form-group">
                <label for="parkeerplaats">Parkeerplaats</label>
                <input type="number" class="form-control" id="parkeerplaats" name="parkeerplaats" value="{{$indeling->parkeerplaats}}">
            </div>

            <div class="form-group">
                <label for="slaapkamer">Slaapkamer</label>
                <input type="number" class="form-control" id="slaapkamer" name="slaapkamer" value="{{$indeling->slaapkamer}}">
            </div>

            <div class="form-group">
                <label for="terras">Terras</label>
                <input type="number" class="form-control" id="terras" name="terras" value="{{$indeling->terras}}">
            </div>

            <div class="form-group">
                <label for="toilet">Toilet</label>
                <input type="number" class="form-control" id="toilet" name="toilet" value="{{$indeling->toilet}}">
            </div>

            <div class="form-group">
                <label for="tuin">Tuin</label>
                <input type="number" class="form-control" id="tuin" name="tuin" value="{{$indeling->tuin}}">
            </div>

            <div class="form-group">
                <label for="wasplaats">Wasplaats</label>
                <input type="number" class="form-control" id="wasplaats" name="wasplaats" value="{{$indeling->wasplaats}}">
            </div>

            <div class="form-group">
                <label for="zolder">Zolder</label>
                <input type="number" class="form-control" id="zolder" name="zolder" value="{{$indeling->zolder}}">
            </div>
                    <button type="submit"> Update </button>
                    </form>

                    <form method="post" action="/dashboard/indeling/{{$indeling->id}}">
                    @csrf
                    @method('delete')
                    <button type="submit"> Delete </button>
                    </form>
                </li>
            @endforeach
        </ul>

        <div class="link__add">
            <a href="/dashboard/indeling/create">Add Indeling</a>
    </div>
</div>

@endsection