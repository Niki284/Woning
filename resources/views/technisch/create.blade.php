

@extends('layouts.base')

@section('content')

<div class="forms">
    <div class="formmini">
        <h1>Voeg hier jouw product toe</h1>

        <form action="{{ route('technisch.store') }}" method="POST" class="form__categorie">
            @csrf

                <input type="hidden" class="form-control" id="woning_id" name="woning_id" value="{{$woning_id}}">

            <div class="form-group">
                <label for="bouwjaar">Bouwjaar</label>
                <input type="text" class="form-control" id="bouwjaar" name="bouwjaar" placeholder="Bouwjaar">
            </div>
            <div class="form-group">
                <label for="algemene_staat">Algemene staat</label>
                <input type="text" class="form-control" id="algemene_staat" name="algemene_staat" placeholder="Algemene staat">
            </div>
            <div class="form-group">
                <label for="renovatieverplichting">Renovatieverplichting</label>
                <input type="text" class="form-control" id="renovatieverplichting" name="renovatieverplichting" placeholder="Renovatieverplichting">
            </div>
            <div class="form-group">
                <label for="overstromingsgevoeligheid">Overstromingsgevoeligheid</label>
                <input type="text" class="form-control" id="overstromingsgevoeligheid" name="overstromingsgevoeligheid" placeholder="Overstromingsgevoeligheid">
            </div>
            <div class="form-group">
                <label for="afgebakende_zone">Afgebakende zone</label>
                <input type="text" class="form-control" id="afgebakende_zone" name="afgebakende_zone" placeholder="Afgebakende zone">
            </div>
            <div class="form-group">
                <label for="G_ebouw_score">G(ebouw)-score</label>
                <input type="text" class="form-control" id="G_ebouw_score" name="G_ebouw_score" placeholder="G(ebouw)-score">
            </div>
            <div class="form-group">
                <label for="P_erceel_score">P(erceel)-score</label>
                <input type="text" class="form-control" id="P_erceel_score" name="P_erceel_score" placeholder="P(erceel)-score">
            </div>
            <div class="form-group">
                <label for="certificaat_elektriciteit">Certificaat elektriciteit</label>
                <input type="text" class="form-control" id="certificaat_elektriciteit" name="certificaat_elektriciteit" placeholder="Certificaat elektriciteit">
            </div>
            <div class="form-group">
                <label for="lift">Lift</label>
                <input type="text" class="form-control" id="lift" name="lift" placeholder="Lift">
            </div>
            <div class="form-group">
                <label for="EPC">EPC</label>
                <input type="text" class="form-control" id="EPC" name="EPC" placeholder="EPC">
            </div>
            <div class="form-group">
                <label for="totale_opp_grond">Totale opp grond</label>
                <input type="text" class="form-control" id="totale_opp_grond" name="totale_opp_grond" placeholder="totale opp grond">
            </div>
            <div class="form-group">
                <label for="bouw_opp_grond">Bouw opp grond</label>
                <input type="text" class="form-control" id="bouw_opp_grond" name="bouw_opp_grond" placeholder="Bouw opp grond">
            </div>
            
            
            
            <button type="submit" class="form__categorie__btn">Add</button>

        </form>
    </div>
</div>

@endsection