@extends('layouts.base')


@section('content')

<div class="forms">
    <div class="formmini">
        <h1>Indeling toevoegen</h1>
        
        <form action="{{ route('indeling.update', $indeling->id) }}" method="POST" class="form__categorie">
            @csrf
            @method('put')
           
            <input type="hidden" name="id" value="{{ $indeling->id }}">
            <div class="form-group
            ">
                <label for="badkamer">Badkamer</label>
                <input type="number" class="form-control" id="badkamer" name="badkamer"placeholder="{{$indeling->badkamer}}"  required>
            </div>

            <div class="form-group
            ">
                <label for="berging">Berging</label>
                <input type="number" class="form-control" id="berging" name="berging" placeholder="{{$indeling->berging}}" required>
            </div>

            <div class="form-group
            ">
                <label for="bureau">Bureau</label>
                <input type="number" class="form-control" id="bureau" name="bureau" placeholder="{{$indeling->bureau}}" required>
            </div>

            <div class="form-group
            ">
                <label for="garage">Garage</label>
                <input type="number" class="form-control" id="garage" name="garage" placeholder="{{$indeling->garage}}" required>
            </div>

            <div class="form-group">
                <label for="keuken">Keuken</label>
                <input type="number" class="form-control" id="keuken" name="keuken" placeholder="{{$indeling->keuken}}" required>
            </div>

            <div class="form-group">
                <label for="living">Living</label>
                <input type="number" class="form-control" id="living" name="living" placeholder="{{$indeling->living}}" required>
            </div>

            <div class="form-group">
                <label for="parkeerplaats">Parkeerplaats</label>
                <input type="number" class="form-control" id="parkeerplaats" name="parkeerplaats" placeholder="{{$indeling->parkeerplaats}}" required>
            </div>

            <div class="form-group">
                <label for="slaapkamer">Slaapkamer</label>
                <input type="number" class="form-control" id="slaapkamer" name="slaapkamer" placeholder="{{$indeling->slaapkamer}}" required>
            </div>

            <div class="form-group">
                <label for="terras">Terras</label>
                <input type="number" class="form-control" id="terras" name="terras" placeholder="{{$indeling->terras}}" required>
            </div>

            <div class="form-group">
                <label for="toilet">Toilet</label>
                <input type="number" class="form-control" id="toilet" name="toilet" placeholder="{{$indeling->toilet}}" required>
            </div>

            <div class="form-group">
                <label for="tuin">Tuin</label>
                <input type="number" class="form-control" id="tuin" name="tuin" placeholder="{{$indeling->tuin}}"required>
            </div>

            <div class="form-group">
                <label for="wasplaats">Wasplaats</label>
                <input type="number" class="form-control" id="wasplaats" name="wasplaats"placeholder="{{$indeling->wasplaats}}" required>
            </div>

            <div class="form-group">
                <label for="zolder">Zolder</label>
                <input type="number" class="form-control" id="zolder" name="zolder" placeholder="{{$indeling->zolder}}" required>
            </div>

            <button type="submit" class="form__categorie__btn">Toevoegen</button>
        </form>
    </div>
</div>

@endsection