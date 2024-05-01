@extends('layouts.base')

@section('content')

<div class="contaner">
    <div class="detail_links">
        @if(auth()->user()->role->is_admin())
        <a href="/dashboard">Go to Dachboard</a>
        <a href="/dashboard/woning/edit/{{$woningHuis->id}}">Update woning </a>
        @endif
    </div>
    <div class="detail__grid">

        <div class="detail__info">
            <div class="detail__info__block">
                <h1>{{ $woningHuis->title }}</h1>

                <h3>
                    {{ $woningHuis->city }} - {{ $woningHuis->address }}
                </h3>
                <h2>{{ $woningHuis->subtitle }}</h2>
                <ul class="detail__mini__list">
                    <li>Bouwtype: {{$woningHuis->bouwtypes->name}}</li>
                    <li>Vraagprijs: € {{ $woningHuis->price }}</li>
                    <li>Totale opp. grond: {{ $woningHuis->size }} m²</li>
                    @if($woningHuis->indeling)
                    <li>Algemene staat: {{ $woningHuis->technisches->algemene_staat }}</li>
                    @endif
                </ul>

            </div>
            <div class="detail__knop">
                <button class="detail__btn" type="submit">Vraag nu uw bezoek aan.</button>
                <a href="#">Of voeg toe aan favorieten </a>
            </div>

            <div class="detail__user">
                <img src="{{$woningHuis->makelaar->image}}" alt="Profielfoto">
                <div class="detail__user__info">
                    <p>{{$woningHuis->makelaar->name}} {{$woningHuis->makelaar->lastname}}</p>
                    <a href="{{$woningHuis->makelaar->phone}}">+{{$woningHuis->makelaar->phone}}</a>
                    <p>
                        <span>
                            (Ref. {{$woningHuis->makelaar->reference}})
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="detail__foto">
            <img src="{{ $woningHuis->image }}" alt="Foto van de woning">
           
        </div>
    </div>
</div>

<div class="maps">
    <div class="gegevens">
        <h2 class="gegevens__title">
            <span class="gegevens__title--svg"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.529 9.988a2.502 2.502 0 1 1 5 .191A2.441 2.441 0 0 1 12 12.582V14m-.01 3.008H12M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </span>
            <span>
                Omgeving
            </span>
        </h2>
        <div class="maps_img">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2519.073292073073!2d4.349630315707073!3d50.85033997953068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c3c3c3c3c3c3%3A0x3c3c3c3c3c3c3c3c!2sManneken%20Pis!5e0!3m2!1snl!2sbe!4v1632213660734!5m2!1snl!2sbe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

    </div>
</div>


<div class="gegevens">
    <h2 class="gegevens__title">
        <span class="gegevens__title--svg"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z" />
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
            </svg>
        </span>
        <span>
            Technisch
        </span>
    </h2>
    @if(auth()->user()->role->is_admin())
    <ul class="gegevens__links">

        <li>
            <a href="/dashboard/woning/{{$woningHuis->id}}/addtechnisch">Voeg technisch</a>
            <a href="/dashboard/woning/{{$woningHuis->id}}/edittechnisch">Update technisch</a>
        </li>
        <li>
            <form action="/dashboard/woning/{{$woningHuis->id}}/deleteindeling" method="POST">
                @csrf
                @method('delete')
                <input type="hidden" name="woning_id" value="{{$woningHuis->id}}">
                <button type="submit"> Delete technisch</button>
            </form>
        </li>

    </ul>
    @endif
    <ul class="gegevens__list--tech">
        @if($woningHuis->technisches)
        <li>
            <span>
                Bouwjaar:
            </span>
            <span>
                {{ $woningHuis->technisches->bouwjaar }}
            </span>
        </li>
        <li>
            <span>
                Algemene staat:
            </span>
            <span>
                {{ $woningHuis->technisches->algemene_staat }}
            </span>
        </li>
        <li>
            <span>
                Renovatieverplichting:
            </span>
            <span>
                {{ $woningHuis->technisches->renovatieverplichting }}
            </span>
        </li>
        <li>
            <span>
                Overstromingsgevoeligheid:
            </span>
            <span>
                {{ $woningHuis->technisches->overstromingsgevoeligheid }}
            </span>
        </li>
        <li>
            <span>
                Afgebakende zone:
            </span>
            <span>
                {{ $woningHuis->technisches->afgebakende_zone }}
            </span>
        </li>
        <li>
            <span>
                G(ebouw) score:
            </span>
            <span>
                {{ $woningHuis->technisches->G_ebouw_score }}
            </span>
        </li>
        <li>
            <span>
                P(ebouw) score:
            </span>
            <span>
                {{ $woningHuis->technisches->P_erceel_score }}
            </span>
        </li>
        <li>
            <span>
                Certificaat elektriciteit:
            </span>
            <span>
                {{ $woningHuis->technisches->certificaat_elektriciteit }}
            </span>
        </li>
        <li>
            <span>
                Lift:
            </span>
            <span>
                {{ $woningHuis->technisches->lift }}
            </span>
        </li>
        <ul>


            <h2 class="gegevens__title">
                Energie
            </h2>
            <ul class="gegevens__list--tech">
                <li>
                    <span>
                        EPC:
                    </span>
                    <span>
                        {{ $woningHuis->technisches->EPC }}
                    </span>
                </li>
            </ul>
            <h2 class="gegevens__title">
                Oppervlaktes en afmetingen
            </h2>
            <ul class="gegevens__list--tech">
                <li>
                    <span>
                        Totale opp. grond:
                    </span>
                    <span>
                        {{ $woningHuis->technisches->totale_opp_grond }}
                    </span>
                </li>
                <li>
                    <span>
                        Bewoonbare opp. (ca.):
                    </span>
                    <span>
                        {{ $woningHuis->technisches->bouw_opp_grond }}
                    </span>
                </li>

            </ul>
            @endif

        </ul>
    </ul>
</div>

<div class="gegevens__reservatie__container">
    <div class="gegevens__reservatie">
        <div class="detail__user">
            <img src="{{$woningHuis->makelaar->image}}" alt="Profielfoto">
            <div class="detail__user__info">
                <p>{{$woningHuis->makelaar->name}} {{$woningHuis->makelaar->lastname}}</p>
                <a href="{{$woningHuis->makelaar->phone}}">{{$woningHuis->makelaar->phone}}</a>
                <p>
                    <span>
                        (Ref. {{$woningHuis->makelaar->reference}} )
                    </span>
                </p>
            </div>
        </div>

        <form action="/dashboard/woning/{{$woningHuis->id}}/reservatie" method="POST">
            @csrf
            <input type="hidden" name="woning_id" value="{{$woningHuis->id}}">
            <button type="submit">Reserveer nu</button>
        </form>

    </div>
</div>



<div class="gegevens">
    <h2 class="gegevens__title">
        <span class="gegevens__title--svg"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.529 9.988a2.502 2.502 0 1 1 5 .191A2.441 2.441 0 0 1 12 12.582V14m-.01 3.008H12M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </span>
        <span>
            Indelingen
        </span>

    </h2>
    @if(auth()->user()->role->is_admin())
    <ul class="gegevens__links">

        <li>
            <a href="/dashboard/woning/{{$woningHuis->id}}/addindeling">Voeg ideling</a>
            <a href="/dashboard/woning/{{$woningHuis->id}}/editindeling">Update indeking</a>
        </li>
        <li>
            <form action="/dashboard/woning/{{$woningHuis->id}}/deleteindeling" method="POST">
                @csrf
                @method('delete')
                <input type="hidden" name="woning_id" value="{{$woningHuis->id}}">
                <button type="submit"> Delete indeling</button>
            </form>
        </li>

    </ul>
    @endif

    <ul class="gegevens__list">
        <li>
            Ruimte
        </li>
        <li>
            Verdieping
    </ul>

    <ul class="gegevens__list--tech">
        @if($woningHuis->indeling)
        <li>
            <span>
                Badkamer:
            </span>
            <span>
                {{ $woningHuis->indeling->badkamer  }}
            </span>
        </li>
        <li>
            <span>
                Berging:
            </span>
            <span>
                {{ $woningHuis->indeling->berging }}
            </span>
        </li>
        <li>
            <span>
                Bureau:
            </span>
            <span>
                {{ $woningHuis->indeling->bureau }}
            </span>
        </li>
        <li>
            <span>
                Garage:
            </span>
            <span>
                {{ $woningHuis->indeling->garage }}
            </span>
        </li>
        <li>
            <span>
                Keuken:
            </span>
            <span>
                {{ $woningHuis->indeling->keuken }}
            </span>
        </li>
        <li>
            <span>
                Living:
            </span>
            <span>
                {{ $woningHuis->indeling->living }}
            </span>
        </li>
        <li>
            <span>
                Parkeerplaats:
            </span>
            <span>
                {{ $woningHuis->indeling->parkeerplaats }}
            </span>
        </li>
        <li>
            <span>
                Slaapkamer:
            </span>
            <span>
                {{ $woningHuis->indeling->slaapkamer }}
            </span>
        </li>
        <li>
            <span>
                Terras:
            </span>
            <span>
                {{ $woningHuis->indeling->terras }}
            </span>
        </li>
        <li>
            <span>
                Toilet:
            </span>
            <span>
                {{ $woningHuis->indeling->toilet }}
            </span>
        </li>
        <li>
            <span>
                Tuin:
            </span>
            <span>
                {{ $woningHuis->indeling->tuin }}
            </span>
        </li>
        <li>
            <span>
                Wasplaats:
            </span>
            <span>
                {{ $woningHuis->indeling->wasplaats }}
            </span>
        </li>
        <li>
            <span>
                Zolder:
            </span>
            <span>
                {{ $woningHuis->indeling->zolder }}
            </span>
        </li>
        @endif
    </ul>

</div>

<div class="gegevens">
    <h2 class="gegevens__title">
        <span class="gegevens__title--svg"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 9a3 3 0 0 1 3-3m-2 15h4m0-3c0-4.1 4-4.9 4-9A6 6 0 1 0 6 9c0 4 4 5 4 9h4Z" />
            </svg></span>
        <span>
            Voorzieningen
        </span>
    </h2>


    <ul class="gegevens__list">
        @foreach($woningHuis->voorzieningen as $voorzining)
        <li>
            <span>
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                </svg>

            </span>
            <span>
                {{ $voorzining->voorzining }}
            </span>
        </li>
        @endforeach
    </ul>

</div>








<div class="gegevens">
    <h2 class="gegevens__title">
        <span class="gegevens__title--svg"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 9a3 3 0 0 1 3-3m-2 15h4m0-3c0-4.1 4-4.9 4-9A6 6 0 1 0 6 9c0 4 4 5 4 9h4Z" />
            </svg></span>
        <span>
            Berekeningen
        </span>
    </h2>


    <ul class="gegevens__list gegevens__list--bereken">
        <li>
            <label for="bedrag">Bedrag:</label>
            <input type="range" id="bedrag" value="{{$woningHuis->price}}">
            <output for="bedrag">{{$woningHuis->price}}</output>
        </li>
        <li>
            <label for="rente">Rente:</label>
            <input type="range" id="rente" value="0.5" min="0.5" max="8">
            <output for="rente">8</output>
        </li>
        <li>
            <label for="looptijd">Looptijd:</label>
            <input type="range" id="looptijd" value="10" min="10" max="40">
            <output for="looptijd">10</output>
        </li>
        <li>
            <label for="maandelijkse_aflossing">Maandelijkse aflossing:</label>
            <input type="range" id="maandelijkse_aflossing" value="1000">
            <output for="maandelijkse_aflossing">1000</output>
        </li>
    </ul>

</div>



<div class="gegevens">
    <h2 class="gegevens__title">
        <span class="gegevens__title--svg"><svg height="800" width="800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M497.9 166.8 434 23.2c-3.3-7.4-10.6-12.1-18.6-12.1H96.5c-8.1 0-15.4 4.7-18.6 12.1l-65.1 146c0 .1-5 10.4 2.2 20.4l224.5 303c12.5 14.8 28.4 6.8 32.8 0l223.1-301.1c4.1-3.6 8.8-14.1 2.5-24.7zm-48.9-9.7H339.2l20.3-105.2h42.6L449 157.1zm-226.9 40.8h67.6l-33.8 175-33.8-175zm-7.9-40.8L193.9 51.9h124l-20.3 105.2h-83.4zM109.7 51.9h42.6l20.3 105.2H62.8l46.9-105.2zm70.8 146 38.3 198.2L71.9 197.9h108.6zM293 396.2 331.3 198h108.6L293 396.2z" />
            </svg>
        </span>
        <span>
            Relevante woningen
        </span>
    </h2>

    <ul class="products">
        @foreach($relentedWoning as $relevant)
        <li class="product">
            <a href="/dashboard/woning/{{$relevant->id }}">
                <div class="product__foto">
                    <img src="{{ $relevant->image }}">
                    <div class="product__button">
                        <button>
                            <i class="fas fa-heart" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="product__price">
                    <span>
                        {{ $relevant->city }} {{ $relevant->address }}
                    </span>
                    <span>€ {{$relevant->price}} </span>
                </div>
                <div class="product__info">
                    <h3>
                        {{$relevant->title}}
                    </h3>
                    <p>
                        {{$relevant->subtitle}}
                    </p>
                </div>
                <div class="product__hidden">

                </div>

                <ul class="product__mini__list product__mini__list--none">
                    <li>
                        <i class="fas fa-bed" aria-hidden="true"></i>
                        <span>
                            {{$relevant->rooms}} kamers
                        </span>

                    </li>
                    <li>
                        <i class="fas fa-bookmark" aria-hidden="true"></i>
                        <span>
                            {{$relevant->refnummer}} ref
                        </span>
                    </li>
                    <li>
                        <i class="fas fa-expand" aria-hidden="true"></i>
                        <span>
                            {{$relevant->size}}m²
                        </span>
                    </li>
                </ul>
            </a>
        </li>
        @endforeach
    </ul>
</div>

@endsection