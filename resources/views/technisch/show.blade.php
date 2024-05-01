@extends('layouts.base')

@section('content')

<main>
        <div class="contaner">
        <div class="detail__grid">
            <div class="detail__info">
                <div class="detail__info__block">
                <h2>test {{$technisch->lift}}</h2>
                </div>
                <div class="detail__knop">
                <button class="detail__btn" type="submit">Vraag nu uw bezoek aan.</button>                   
                    <a href="#">Of voeg toe aan favorieten </a>
                </div>
            
            </div>

        </div>
    </div>
</main>

@endsection

