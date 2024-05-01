@extends('layouts.base')

@section('content')
    <div class="container forms">
            <div class="formmini">
        <h1>Indeling toevoegen</h1>
        <form class="form__categorie" method="POST" action="{{ route('indeling.store') }}">
            @csrf
            
            <input type="hidden" class="form-control" id="woning_id" name="woning_id" value="{{$woning_id}}">
            <div class="form-group">
                <label for="badkamer">Badkamer</label>
                <input type="number" class="form-control" id="badkamer" name="badkamer" required>
            </div>
            
            <div class="form-group">
                <label for="berging">Berging</label>
                <input type="number" class="form-control" id="berging" name="berging" required>
            </div>

            <div class="form-group">
                <label for="bureau">Bureau</label>
                <input type="number" class="form-control" id="bureau" name="bureau" required>
            </div>

            <div class="form-group">
                <label for="garage">Garage</label>
                <input type="number" class="form-control" id="garage" name="garage" required>
            </div>

            <div class="form-group">
                <label for="keuken">Keuken</label>
                <input type="number" class="form-control" id="keuken" name="keuken" required>
            </div>

            <div class="form-group">
                <label for="living">Living</label>
                <input type="number" class="form-control" id="living" name="living" required>
            </div>

            <div class="form-group">
                <label for="parkeerplaats">Parkeerplaats</label>
                <input type="number" class="form-control" id="parkeerplaats" name="parkeerplaats" required>
            </div>

            <div class="form-group">
                <label for="slaapkamer">Slaapkamer</label>
                <input type="number" class="form-control" id="slaapkamer" name="slaapkamer" required>
            </div>

            <div class="form-group">
                <label for="terras">Terras</label>
                <input type="number" class="form-control" id="terras" name="terras" required>
            </div>

            <div class="form-group">
                <label for="toilet">Toilet</label>
                <input type="number" class="form-control" id="toilet" name="toilet" required>
            </div>

            <div class="form-group">
                <label for="tuin">Tuin</label>
                <input type="number" class="form-control" id="tuin" name="tuin" required>
            </div>

            <div class="form-group">
                <label for="wasplaats">Wasplaats</label>
                <input type="number" class="form-control" id="wasplaats" name="wasplaats" required>
            </div>

            <div class="form-group">
                <label for="zolder">Zolder</label>
                <input type="number" class="form-control" id="zolder" name="zolder" required>
            </div>

            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
        
    
    </div>
@endsection