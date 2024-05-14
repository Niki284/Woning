@extends('layouts.app')

@section('content')
    <div class="container forms">
            <div class="formmini">
        <h1>Bout toevoegen</h1>
        <form class="form__categorie" method="POST" action="{{ route('bouwtechnisch.update', $bouwtechnisch->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="beglazing">Beglazing</label>
                <input type="text" class="form-control" id="beglazing" name="beglazing" placeholder="beglazing" required >
            </div>
            
            <div class="form-group">
                <label for="Stedenbouwkundige_bestemming">Stedenbouwkundige bestemming</label>
                <input type="text" class="form-control" id="Stedenbouwkundige_bestemming" name="stedenbouwkundige_bestemming" placeholder="Stedenbouwkundige bestemming" required >
            </div>

            <div class="form-group">
                <label for="Dagvaarding_stedenbouwkundige">Dagvaarding stedenbouwkundige</label>
                <input type="text" class="form-control" id="Dagvaarding_stedenbouwkundige" name="Dagvaarding_stedenbouwkundige" placeholder="Dagvaarding stedenbouwkundige" required >
            </div>

            <div class="form-group">
                <label for="Bouwvergunning">Bouwvergunning</label>
                <input type="text" class="form-control" id="Bouwvergunning" name="Bouwvergunning" placeholder="Bouwvergunning" required >
            </div>

            <div class="form-group">
                <label for="Verkavelingsvergunning">Verkavelingsvergunning</label>
                <input type="text" class="form-control" id="Verkavelingsvergunning" name="Verkavelingsvergunning" placeholder="Verkavelingsvergunning" required >
            </div>

            <div class="form-group">
                <label for="Recht_van_voorkoop">Recht van voorkoop</label>
                <input type="text" class="form-control" id="Recht_van_voorkoop" name="Recht_van_voorkoop" placeholder="Recht van voorkoop" required >
            </div>

            <div class="form-group">
                <label for="As_built_attest">As built attest</label>
                <input type="text" class="form-control" id="As_built_attest" name="As_built_attest" placeholder="As built attest" required >
            </div>

            <div class="form-group">
                <label for="Beschermd_erfgoed">Beschermd erfgoed</label>
                <input type="text" class="form-control" id="Beschermd_erfgoed" name="Beschermd_erfgoed" placeholder="Beschermd erfgoed" required >
            </div>

            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
        
    
    </div>
@endsection