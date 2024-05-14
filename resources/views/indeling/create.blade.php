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
                <input type="number" class="form-control" id="badkamer" name="badkamer" placeholder="0" required>
            </div>
            
            <div class="form-group">
                <label for="berging">Berging</label>
                <input type="number" class="form-control" id="berging" name="berging"placeholder="0"  required>
            </div>

            <div class="form-group">
                <label for="bureau">Bureau</label>
                <input type="number" class="form-control" id="bureau" name="bureau" placeholder="0" required>
            </div>

            <div class="form-group">
                <label for="garage">Garage</label>
                <input type="number" class="form-control" id="garage" name="garage" placeholder="0" required>
            </div>

            <div class="form-group">
                <label for="keuken">Keuken</label>
                <input type="number" class="form-control" id="keuken" name="keuken"placeholder="0"  required>
            </div>

            <div class="form-group">
                <label for="living">Living</label>
                <input type="number" class="form-control" id="living" name="living"placeholder="0"  required>
            </div>

            <div class="form-group">
                <label for="parkeerplaats">Parkeerplaats</label>
                <input type="number" class="form-control" id="parkeerplaats" name="parkeerplaats" placeholder="0"  required>
            </div>

            <div class="form-group">
                <label for="slaapkamer">Slaapkamer</label>
                <input type="number" class="form-control" id="slaapkamer" name="slaapkamer" placeholder="0"  required>
            </div>

            <div class="form-group">
                <label for="terras">Terras</label>
                <input type="number" class="form-control" id="terras" name="terras" placeholder="0"  required>
            </div>

            <div class="form-group">
                <label for="toilet">Toilet</label>
                <input type="number" class="form-control" id="toilet" name="toilet" placeholder="0"  required>
            </div>

            <div class="form-group">
                <label for="tuin">Tuin</label>
                <input type="number" class="form-control" id="tuin" name="tuin" placeholder="0"  required>
            </div>

            <div class="form-group">
                <label for="wasplaats">Wasplaats</label>
                <input type="number" class="form-control" id="wasplaats" name="wasplaats" placeholder="0"  required>
            </div>

            <div class="form-group">
                <label for="zolder">Zolder</label>
                <input type="number" class="form-control" id="zolder" name="zolder" placeholder="0"  required>
            </div>

            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
        
    
    </div>
@endsection