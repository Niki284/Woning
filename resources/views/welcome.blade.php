@extends('layouts.app')

@section('content')

<div class="product__filter">
    <ul class="product__filter__list">
        <li>
        <form method="get" action="/woning">

<select name="filterGemente" id="filterGemente">
    <option value="">-- gemeente -- </option>
    <?php foreach ($woningHuis as $gemeente) : ?>
        <option value="{{$gemeente->city}}">{{$gemeente->city}}</option>
    <?php endforeach; ?>
</select>
</li>
<li>            
     <select name="filter" id="filter">
        <option value=""> -- Woningtype -- </option>
        <option value="Huis">Huis</option>
        <option value="Appartement">Appartement</option>
        <option value="Grond">Grond</option>
    </select>
</li>
<li>
<div class="product__flex--input">


<input type="text" placeholder="min-prijs" name="minprice"">
    <input type=" text" placeholder="max-prijs" name="maxprice"">

    </div>
</li>
<li>
    <button class=" product__mini__list__btn " type=" submit">Wis zoeklijsten</button>
</form>
        </li>
    </ul>
</div>

<ul class="products">
    <?php foreach ($woningHuis as $product) : ?>
        <li class="product">
            <a href="/woning/{{$product->id }}">
                <div class="product__foto">
                    <img src="{{ $product->image }}">
                    <p class="product--overflo">
                                                    {{ $product->nieuwTypes->name }}
                                                </p>
                                                <!-- <div class="hiddenknop">
                                                    <a href=""> Clik more</a>
                                                </div> -->
                                                <div class="product__button">
                                                    <button>
                                                        <svg class="w-8 h-8 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                                                        </svg>

                                                    </button>
                                                </div>
                </div>
                <div class="product__price">
                    <span>
                        {{$product->postcode}} {{$product->city}} {{$product->address}} 
                    </span>
                    <span>€ <?php echo $product->price; ?></span>
                </div>
                <div class="product__info">
                    <h3>
                    {{$product->title}}
                    </h3>
                    <p>
                    {{$product->subtitle}}
                    </p>
                </div>


                <ul class="product__mini__list">
                    <li>
                        <i class="fas fa-bed" aria-hidden="true"></i>
                        <span>
                        {{$product->rooms}} kamers
                        </span>

                    </li>
                    <li>
                        <i class="fas fa-bookmark" aria-hidden="true"></i>
                        <span>
                        {{$product->refnummer}}
                            ref
                        </span>
                    </li>
                    <li>
                    <i class="fas fa-expand" aria-hidden="true"></i>                        <span>
                    {{$product->size}}        
                    m²
                        </span>
                    </li>
                </ul>
            </a>
        </li>

    <?php endforeach;
    ?>
</ul>
</div>

@endsection