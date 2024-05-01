@extends('layouts.base')

@section('content')

<div class="forms">
    <div class="formmini">
        <h1>Techniches</h1>

        <ul class="list__render list__render--flex">
            @foreach ($technisch as $technisch)
                <li class="list__render__item">
                    <form method="post" action="/dashboard/technisch/update/{{$technisch->id}}">
                    @csrf
                    @method('put')
                    <label for="bouwjaar">bouwjaar</label>
                    <input type="text" name="bouwjaar" value="{{$technisch->bouwjaar}}">
                    <label for="algemene_staat">algemene_staat</label>
                    <input type="text" name="algemene_staat" value="{{$technisch->algemene_staat}}">
                    <label for="renovatieverplichting">renovatieverplichting</label>
                    <input type="text" name="renovatieverplichting" value="{{$technisch->renovatieverplichting}}">
                    <label for="overstromingsgevoeligheid">overstromingsgevoeligheid</label>
                    <input type="text" name="overstromingsgevoeligheid" value="{{$technisch->overstromingsgevoeligheid}}">
                    <label for="afgebakende_zone">afgebakende_zone</label>
                    <input type="text" name="afgebakende_zone" value="{{$technisch->afgebakende_zone}}">
                    <label for="G_ebouw_score">G_ebouw_score</label>
                    <input type="text" name="G_ebouw_score" value="{{$technisch->G_ebouw_score}}">
                    <label for="P_erceel_score">P_erceel_score</label>
                    <input type="text" name="P_erceel_score" value="{{$technisch->P_erceel_score}}">
                    <label for="certificaat_elektriciteit">certificaat_elektriciteit</label>
                    <input type="text" name="certificaat_elektriciteit" value="{{$technisch->certificaat_elektriciteit}}">
                    <label for="lift">lift</label>
                    <input type="text" name="lift" value="{{$technisch->lift}}">
                    <label for="EPC">EPC</label>
                    <input type="text" name="EPC" value="{{$technisch->EPC}}">
                    <label for="totale_opp_grond">totale_opp_grond</label>
                    <input type="text" name="totale_opp_grond" value="{{$technisch->totale_opp_grond}}">
                    <label for="bouw_opp_grond">bouw_opp_grond</label>
                    <input type="text" name="bouw_opp_grond" value="{{$technisch->bouw_opp_grond}}">

                    <button type="submit"> Update </button>
                    </form>
                <form method="post" action="/technisch/{{$technisch->id}}">
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>
                </li>
            @endforeach
        </ul>

        <div class="link__add">
            <a href="/dashboard/technisch/create">Add Technisch</a>
    </div>
</div>

@endsection