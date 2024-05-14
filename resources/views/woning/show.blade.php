@extends('layouts.app')

@section('content')

<div class="contaner">
    <div class="detail_links py-4 gap-4 flex">
        @if(auth()->user()->role->is_admin())
        <a class="bg-red-600 p-2" href="/dashboard">Go to Dachboard</a>
        <a class="bg-blue-300 p-2 " href="/dashboard/woning/edit/{{$woningHuis->id}}">Update woning </a>
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
                    <li>Algemene staat: {{ $woningHuis->technisches?->algemene_staat }}</li>
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
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($woningHuis->gallery as $key => $slider)
                    <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                        <img src="{{ $slider->image }}" class="d-block w-100" alt="">
                    </div>
                    @endforeach

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

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
        <div class="maps_img" id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2519.073292073073!2d4.349630315707073!3d50.85033997953068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c3c3c3c3c3c3%3A0x3c3c3c3c3c3c3c3c!2sManneken%20Pis!5e0!3m2!1snl!2sbe!4v1632213660734!5m2!1snl!2sbe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

    </div>
</div>


<div class="gegevens">
    <h2 class="gegevens__title">
        <span class="gegevens__title--svg">
            <svg height="800" width="800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 478.268 478.268" xml:space="preserve">
                <path d="M445.905 0H145.418c-8.781 0-15.902 7.121-15.902 15.902v237.204l31.804-31.804V31.804h268.683v373.849h-20.018v31.804h35.92c8.781 0 15.902-7.121 15.902-15.902V15.902C461.807 7.121 454.686 0 445.905 0zM134.353 432.922c2.866 2.788 6.755 4.535 11.065 4.535h181.501v-31.804H161.622l-27.269 27.269z" />
                <path d="M417.634 350.849c0-9.629-2.874-18.534-7.649-26.121-3.16-5.016-7.213-9.341-11.919-12.921-8.253-6.273-18.442-10.141-29.615-10.141-11.173 0-21.361 3.867-29.615 10.141-4.705 3.58-8.759 7.905-11.919 12.921-4.775 7.587-7.649 16.492-7.649 26.121 0 9.621 2.874 18.534 7.649 26.113 4.03 6.397 9.465 11.725 15.902 15.684v80.863a4.774 4.774 0 0 0 3.02 4.434 4.779 4.779 0 0 0 5.234-1.204l13.884-15.016a4.758 4.758 0 0 1 3.494-1.522c1.328 0 2.594.55 3.494 1.522l13.884 15.016a4.779 4.779 0 0 0 5.234 1.204 4.773 4.773 0 0 0 3.02-4.434v-80.863c6.437-3.96 11.873-9.287 15.902-15.684 4.776-7.579 7.649-16.492 7.649-26.113zm-49.182-21.485c11.865 0 21.485 9.621 21.485 21.485 0 11.865-9.621 21.485-21.485 21.485-11.865 0-21.485-9.621-21.485-21.485 0-11.864 9.62-21.485 21.485-21.485zM327.991 245.187a71.959 71.959 0 0 0 54.942-30.338l13.372-18.938c11.537-16.32 9.627-38.568-4.503-52.692a8.73 8.73 0 0 0-6.197-2.57 8.724 8.724 0 0 0-6.203 2.57l-34.84 34.826a15.641 15.641 0 0 1-11.081 4.597 15.626 15.626 0 0 1-11.081-4.597l-25.5-25.499a15.626 15.626 0 0 1-4.597-11.081c0-4.162 1.646-8.137 4.589-11.089l34.832-34.832a8.754 8.754 0 0 0 0-12.4c-7.943-7.951-18.456-12.027-29.033-12.027a40.912 40.912 0 0 0-23.659 7.515l-18.938 13.379a71.972 71.972 0 0 0-30.337 54.944l-2.252 41.883L28.598 387.771c-16.182 16.18-16.182 42.403 0 58.583 8.091 8.099 18.698 12.145 29.296 12.145s21.198-4.046 29.289-12.137l198.933-198.931 41.875-2.244z" />
            </svg>
        </span>
        <span>
            Technisch
        </span>
    </h2> 
    @if(auth()->user()->role->is_admin())
    <ul class="gegevens__links">
       
        <li>
            <a href="/dashboard/woning/{{$woningHuis->id}}/addtechnisch">Voeg technisch toe</a>
        </li>
        @endif

        @if(auth()->user()->role->is_admin() && $woningHuis->technisches)
        <li>
            <a href="/dashboard/woning/{{$woningHuis->id}}/edittechnisch">Bijwerk technisch</a>
        </li>
        <li>
            <form action="{{ route('technisch.destroy', ['id' => $woningHuis->technisches->id]) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Verwijder technisch</button>
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
        <span class="gegevens__title--svg">
            <svg height="800" width="800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve">
                <path d="m17 23.1-5-2.5-5 2.5-6-3v-7.2l5-2.8V3.9l6-3 6 3v6.5l5 2.5v7.2l-6 3zm1-6.5v3.8l3-1.5v-3.8l-3 1.5zm-5 2.3 3 1.5v-3.8l-3-1.5v3.8zm-5-2.3v3.8l3-1.5v-3.8l-3 1.5zm-5 2.3 3 1.5v-3.8l-3-1.5v3.8zm11.2-5.4 2.8 1.4 2.8-1.4-2.8-1.4-2.8 1.4zm-10.1-.1L7 14.9l2.9-1.4L7 11.8l-2.9 1.6zM13 7.6v4.3l3-1.5V6.1l-3 1.5zm-5 2.5 3 1.7V7.6L8 6.1v4zm1.2-5.6L12 5.9l2.8-1.4L12 3.1 9.2 4.5z" />
            </svg>

        </span>
        <span>
            Indelingen
        </span>

    </h2> 
    @if(auth()->user()->role->is_admin())
    <ul class="gegevens__links">
       
        <li>

            <a href="/dashboard/woning/{{$woningHuis->id}}/addindeling">Voeg indeling toe</a>

        </li>
        @endif
        @if(auth()->user()->role->is_admin() && $woningHuis->indeling)
        <li>
            <a href="{{ route('indeling.edit', ['id' => $woningHuis->indeling->id]) }}">Bijwerken indeling </a>
        </li>

        <li>
            <form action="{{route('indeling.destroy', ['id' => $woningHuis->indeling->id])}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Verwijder indeking</button>
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



<div class="gegevens detail__grid gegevens__grid">

    <div class="gegevens__grid--score">
        <h2>Score</h2>
        <ul class="gegevens__list">
            <li>
                <span>Score:</span>
                <span> {{ $woningHuis->bouwtechnisch?->beglazing}}</span>
            </li>
            <!-- Voeg hier extra items toe indien nodig -->
        </ul>
    </div>




    <div class="gegevens__grid--text">
        <h2 class="py-4 text-red-600">{{$woningHuis->title}}</h2>
        <p>{{$woningHuis->description}}</p>

        <div class="gegevens">
            <h2 class="gegevens__title">
                <span>
                    Bouwtechnisch
                </span>
            </h2>
            @if(auth()->user()->role->is_admin())
            <ul class="gegevens__links">
                
                <li>
                    <a href="/dashboard/woning/{{$woningHuis->id}}/addbouwtechnisch">Voeg bouwtechnisch toe</a>
                </li>
                @endif

                @if(auth()->user()->role->is_admin() && $woningHuis->bouwtechnisch)
                <li>
                    <a href="{{route('bouwtechnisch.edit', ['id' => $woningHuis->bouwtechnisch->id])}}">Bijwerken bouwtechnisch</a>
                </li>
                <li>
                    <form action="{{ route('bouwtechnisch.destroy', ['id' => $woningHuis->bouwtechnisch->id]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit">Verwijder bouwtechnisch</button>
                    </form>
                </li>

               
            </ul> 
            @endif
            <ul class="gegevens__list--tech">
                @if($woningHuis->bouwtechnisch)
                <li>
                    <span>
                        Stedenbouwkundige bestemming:
                    </span>
                    <span>
                        {{ $woningHuis->bouwtechnisch->stedenbouwkundige_bestemming }}
                    </span>
                </li>
                <li>
                    <span>
                        Dagvaarding stedenbouwkundige:
                    </span>
                    <span>
                        {{ $woningHuis->bouwtechnisch->Dagvaarding_stedenbouwkundige }}
                    </span>
                </li>

                <li>
                    <span>
                        Bouwvergunning:
                    </span>
                    <span>
                        {{ $woningHuis->bouwtechnisch->Bouwvergunning }}
                    </span>
                </li>
                <li>
                    <span>
                        Verkavelingsvergunning:
                    </span>
                    <span>
                        {{ $woningHuis->bouwtechnisch->Verkavelingsvergunning }}
                    </span>
                </li>
                <li>
                    <span>
                        Recht van voorkoop:
                    </span>
                    <span>
                        {{ $woningHuis->bouwtechnisch->Recht_van_voorkoop }}
                    </span>
                </li>
                <li>
                    <span>
                        As built attest:
                    </span>
                    <span>
                        {{ $woningHuis->bouwtechnisch->As_built_attest }}
                    </span>
                </li>
                <li>
                    <span>
                        Beschermd erfgoed:
                    </span>
                    <span>
                        {{ $woningHuis->bouwtechnisch->Beschermd_erfgoed }}
                    </span>
                    <ul>
                        @endif

                    </ul>
            </ul>
        </div>
    </div>
    <div class="detail__info">
        <div class="detail__info__block">
            <h1>{{ $woningHuis->title }}</h1>
            <h3>{{ $woningHuis->city }} - {{ $woningHuis->address }}</h3>
            <img src="{{ $woningHuis->image }}" alt="Foto van de woning">
            <h2>Vraagprijs: € {{ $woningHuis->price }}</h2>
            <ul class="detail__mini__list">
                <li>Bouwtype: {{$woningHuis->bouwtypes->name}}</li>
                <li>Totale opp. grond: {{ $woningHuis->size }} m²</li>
                @if($woningHuis->indeling)
                <li>Algemene staat: {{ $woningHuis->technisches?->algemene_staat }}</li>
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
                <p><span>(Ref. {{$woningHuis->makelaar->reference}})</span></p>
            </div>
        </div>
    </div>


</div>





<div class="gegevens">
    <h2 class="gegevens__title">
        <span class="gegevens__title--svg"><svg xmlns="http://www.w3.org/2000/svg" width="800" height="800" viewBox="0 0 1800 1800" xml:space="preserve">
                <g fill="#333">
                    <path d="m1094.819 1135.051-108.863-17.528a432.31 432.31 0 0 0-40.445-97.562l64.601-89.408c8.963-12.402 7.593-29.477-3.227-40.295l-97.074-97.083c-10.828-10.832-27.9-12.188-40.297-3.227l-89.409 64.601a432.41 432.41 0 0 0-97.557-40.44l-17.538-108.87c-2.435-15.106-15.472-26.212-30.774-26.212H496.934c-15.302 0-28.339 11.105-30.774 26.212l-17.535 108.864a432.436 432.436 0 0 0-97.555 40.445l-89.409-64.601c-12.399-8.958-29.474-7.597-40.295 3.222l-97.083 97.083c-10.819 10.823-12.187 27.897-3.225 40.3l64.599 89.408a432.517 432.517 0 0 0-40.443 97.562L36.348 1135.05c-15.106 2.436-26.214 15.472-26.214 30.774v137.306c0 15.303 11.106 28.339 26.212 30.774l108.868 17.533a432.725 432.725 0 0 0 40.443 97.557l-64.599 89.409c-8.962 12.401-7.595 29.474 3.225 40.297l97.083 97.083c10.819 10.819 27.892 12.181 40.295 3.223l89.409-64.605a432.727 432.727 0 0 0 97.555 40.445l17.535 108.867c2.433 15.107 15.472 26.213 30.774 26.213h137.302c15.302 0 28.339-11.105 30.774-26.213l17.537-108.871a432.428 432.428 0 0 0 97.549-40.437l89.417 64.601c12.402 8.962 29.478 7.601 40.297-3.223l97.083-97.079c10.819-10.823 12.185-27.895 3.222-40.297l-64.604-89.413a432.407 432.407 0 0 0 40.445-97.557l108.868-17.533c15.105-2.436 26.212-15.472 26.212-30.774v-137.306c0-15.302-11.11-28.338-26.217-30.773zm-36.122 141.529-102.915 16.576a31.165 31.165 0 0 0-25.447 23.916c-9.362 41.506-25.665 80.833-48.459 116.882a31.176 31.176 0 0 0 1.083 34.914l61.078 84.529-59.535 59.53-84.534-61.074a31.171 31.171 0 0 0-34.909-1.083c-36.058 22.795-75.376 39.093-116.878 48.446a31.185 31.185 0 0 0-23.917 25.451l-16.576 102.92h-84.204l-16.576-102.915a31.17 31.17 0 0 0-23.916-25.447c-41.495-9.357-80.822-25.66-116.889-48.455a31.168 31.168 0 0 0-34.907 1.083l-84.525 61.074-59.535-59.535 61.069-84.524a31.171 31.171 0 0 0 1.085-34.909c-22.796-36.066-39.097-75.394-48.454-116.887a31.171 31.171 0 0 0-25.45-23.916L72.474 1276.58v-84.204l102.912-16.571a31.174 31.174 0 0 0 25.452-23.921c9.351-41.488 25.653-80.812 48.454-116.887a31.171 31.171 0 0 0-1.085-34.909l-61.069-84.525 59.535-59.536 84.525 61.076a31.17 31.17 0 0 0 34.909 1.083c36.073-22.806 75.398-39.108 116.882-48.457a31.177 31.177 0 0 0 23.921-25.452l16.576-102.911h84.204l16.576 102.915a31.179 31.179 0 0 0 23.917 25.451c41.502 9.354 80.82 25.656 116.878 48.453a31.176 31.176 0 0 0 34.913-1.083l84.53-61.076 59.53 59.536-61.073 84.53a31.174 31.174 0 0 0-1.083 34.913c22.799 36.054 39.101 75.376 48.459 116.878a31.17 31.17 0 0 0 25.447 23.921l102.915 16.571v84.205z" />
                    <path d="M565.583 928.422c-168.759 0-306.052 137.293-306.052 306.052s137.293 306.053 306.052 306.053c168.763 0 306.061-137.294 306.061-306.053S734.346 928.422 565.583 928.422zm0 549.765c-134.384 0-243.713-109.328-243.713-243.713s109.329-243.713 243.713-243.713c134.389 0 243.722 109.328 243.722 243.713s-109.333 243.713-243.722 243.713zM1767.072 581.748l-74.516-50.033a368.839 368.839 0 0 0 3.291-83.786l78.155-44.071c13.328-7.519 19.229-23.595 13.929-37.949l-40.059-108.459c-5.301-14.359-20.233-22.725-35.248-19.79l-88.043 17.302a369.033 369.033 0 0 0-56.956-61.531l24.099-86.456c4.105-14.741-3.088-30.278-16.984-36.679l-105.002-48.368c-13.902-6.418-30.392-1.774-38.919 10.932l-50.038 74.52a370.393 370.393 0 0 0-83.777-3.288l-44.075-78.154c-7.522-13.332-23.595-19.233-37.953-13.928l-108.459 40.058c-14.358 5.301-22.738 20.237-19.786 35.253l17.308 88.03a368.813 368.813 0 0 0-61.54 56.964l-86.446-24.104c-14.741-4.092-30.282 3.092-36.684 16.985l-48.372 105.002c-6.401 13.897-1.766 30.387 10.932 38.918l74.511 50.038a368.879 368.879 0 0 0-3.283 83.781l-78.15 44.072c-13.328 7.519-19.229 23.599-13.928 37.949l40.058 108.463c5.301 14.354 20.256 22.76 35.253 19.786l88.03-17.303a368.597 368.597 0 0 0 56.961 61.535l-24.104 86.451c-4.105 14.737 3.087 30.283 16.984 36.684l105.006 48.366c13.902 6.404 30.387 1.77 38.919-10.938l50.042-74.512a370.134 370.134 0 0 0 83.777 3.288l44.076 78.161c5.656 10.036 16.176 15.863 27.151 15.863 3.601 0 7.253-.626 10.792-1.936l108.469-40.06c14.357-5.301 22.738-20.238 19.785-35.253l-17.307-88.039a369.221 369.221 0 0 0 61.535-56.96l86.451 24.104c14.74 4.092 30.282-3.088 36.684-16.985l48.363-105.006c6.4-13.896 1.773-30.385-10.932-38.917zm-82.947 93.731-80.555-22.459c-12.275-3.409-25.378.97-33.118 11.08-21.507 28.091-47.402 52.06-76.968 71.245a31.154 31.154 0 0 0-13.619 32.161l16.124 82.021-58.651 21.664-41.059-72.815a31.169 31.169 0 0 0-31.256-15.589c-34.727 4.623-70.428 3.214-104.798-4.109-12.445-2.656-25.269 2.535-32.37 13.111l-46.624 69.418-56.772-26.147 22.455-80.555a31.171 31.171 0 0 0-11.08-33.122c-28.092-21.503-52.06-47.398-71.245-76.963-6.927-10.685-19.655-16.072-32.161-13.619l-82.012 16.119-21.664-58.651 72.811-41.058a31.163 31.163 0 0 0 15.585-31.252c-4.636-34.957-3.253-70.214 4.113-104.793a31.18 31.18 0 0 0-13.106-32.374l-69.427-46.62 26.155-56.777 80.551 22.459c12.264 3.405 25.383-.97 33.123-11.084 21.48-28.073 47.38-52.042 76.971-71.245a31.156 31.156 0 0 0 13.615-32.161l-16.123-82.012 58.651-21.664 41.058 72.81a31.149 31.149 0 0 0 31.257 15.589c34.727-4.609 70.419-3.209 104.798 4.113a31.192 31.192 0 0 0 32.369-13.11l46.62-69.432 56.773 26.151-22.456 80.563a31.172 31.172 0 0 0 11.084 33.123c28.065 21.481 52.034 47.372 71.232 76.958 6.936 10.685 19.668 16.059 32.156 13.62l82.029-16.12 21.664 58.647-72.818 41.058a31.162 31.162 0 0 0-15.585 31.252c4.64 34.97 3.257 70.228-4.114 104.793a31.161 31.161 0 0 0 13.106 32.378l69.432 46.62-26.151 56.778z" />
                    <path d="M1324.474 212.717c-31.026 0-61.63 5.492-90.97 16.329-135.858 50.172-205.564 201.52-155.392 337.383 37.927 102.701 136.95 171.707 246.409 171.716h.018c31.014 0 61.617-5.492 90.952-16.329 135.854-50.172 205.568-201.52 155.396-337.375-37.936-102.714-136.959-171.724-246.413-171.724zm69.422 450.621c-22.402 8.275-45.736 12.467-69.357 12.467h-.014c-83.477-.004-159.005-52.638-187.936-130.971-38.266-103.619 14.898-219.048 118.514-257.311 22.398-8.275 45.736-12.467 69.37-12.467 83.478 0 159.001 52.638 187.936 130.979 38.263 103.611-14.906 219.036-118.513 257.303z" />
                </g>
            </svg></span>
        <span>
            Berekeningen
        </span>
    </h2>


    <ul class="gegevens__list gegevens__list--bereken">
        <li>
            <label for="maandelijkse_aflossing">Jaarlijks aflossing:</label>
            <input type="range" id="bedrag" value="{{$woningHuis->price}}" min="700" max="30000">
            <!-- <output for="maandelijkse_aflossing">1000</output> -->
            <output for="bedrag">{{$woningHuis->price}}</output>
        </li>
        <li>
            <label for="rente">Rente:</label>
            <input type="range" id="rente" value="0.5" min="0.5" max="8.5">
            <output for="rente"></output>
        </li>
        <li>
            <label for="looptijd">Looptijd:</label>
            <input type="range" id="looptijd" value="10" min="10" max="40">
            <output for="looptijd">10</output>
        </li>
        <li>
            <label for="bedrag">Bedrag:</label>
            <output for="bedrag">{{$woningHuis->price}}</output>
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


</div>

<ul class="products">
    @foreach ($relentedWoning as $relevant)
    <li class="product">
            <div class="product__foto">
                <div class="hiddenknop">
                    <a href="/woning/{{$relevant->id }}"> Klik voor meer info 

                </div>
                <img src="{{ $relevant->image }}">
                <p class="product--overflo">
                    {{ $relevant->nieuwTypes->name }}
                </p>



                <div class="product__button">
                    <button>
                        <svg class="w-8 h-8 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                        </svg>

                    </button>
                </div>
            
        </a>
        </div>
        <div class="product__price">
            <span class="max-w-72 min-h-16">
                {{$relevant->city}} {{ $relevant->address }}
            </span>
            <span>€ {{$relevant->price}}</span>
        </div>
        <div class="product__info min-h-32">
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
                <span class="flex gap-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 5V19M3 16H21M21 19V13.2C21 12.0799 21 11.5198 20.782 11.092C20.5903 10.7157 20.2843 10.4097 19.908 10.218C19.4802 10 18.9201 10 17.8 10H11V15.7273M7 12H7.01M8 12C8 12.5523 7.55228 13 7 13C6.44772 13 6 12.5523 6 12C6 11.4477 6.44772 11 7 11C7.55228 11 8 11.4477 8 12Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    {{$relevant->rooms}} kamers
                </span>

            </li>
            <li>

                <span class="flex gap-2">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7.833 2c-.507 0-.98.216-1.318.576A1.92 1.92 0 0 0 6 3.89V21a1 1 0 0 0 1.625.78L12 18.28l4.375 3.5A1 1 0 0 0 18 21V3.889c0-.481-.178-.954-.515-1.313A1.808 1.808 0 0 0 16.167 2H7.833Z" />
                    </svg>
                    {{$relevant->refnummer}} ref
                </span>
            </li>
            <li>
                <span class="flex gap-2">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H4m0 0v4m0-4 5 5m7-5h4m0 0v4m0-4-5 5M8 20H4m0 0v-4m0 4 5-5m7 5h4m0 0v-4m0 4-5-5" />
                    </svg>
                    {{$relevant->size}}m²
                </span>
            </li>
        </ul>
        </a>
    </li>
    @endforeach
</ul>


<script>

    
const berekenBedrag = () => {
      
      const totaalBedrag = parseFloat(document.getElementById("bedrag").value);
      const rente = parseFloat(document.getElementById("rente").value);
      const looptijd = parseFloat(document.getElementById("looptijd").value);
      
      const rentePerMaand = rente / 100 / 12;
      const aantalMaanden = looptijd * 12;
      const bedragPerMaand = (totaalBedrag * rentePerMaand) / (1 - Math.pow(1 + rentePerMaand, -aantalMaanden));
      const totaalTerugTeBetalenBedrag = bedragPerMaand * aantalMaanden;
  
      document.querySelector("output[for='bedrag']").innerHTML = totaalTerugTeBetalenBedrag.toFixed(2);
      document.querySelector("output[for='rente']").innerHTML = `${rente}%`;
      document.querySelector("output[for='looptijd']").innerHTML = `${looptijd} jaar`;
      document.querySelector("output[for='maandelijkse_aflossing']").innerHTML = bedragPerMaand.toFixed(2);
  }
  
  // Event listeners toevoegen aan de sliders
  const sliders = document.querySelectorAll("input[type='range']");
  sliders.forEach(slider => {
      slider.addEventListener("input", berekenBedrag);
  });
  
  const maandelijkseAflossing = document.getElementById('maandelijkse_aflossing');
  maandelijkseAflossing.addEventListener("input", berekenBedrag);
  
  // Initieel bedrag berekenen
  
  berekenBedrag();
</script>

@endsection