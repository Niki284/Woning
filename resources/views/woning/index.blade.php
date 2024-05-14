@extends('layouts.app')

@section('content')

<div class="product__filter">
    <ul class="product__filter__list my-4">
        <li>
            <form method="get" action="/woning">

                <select name="filterGemente" id="filterGemente">
                    <option value="">-- Gemeente -- </option>
                    <?php
                    $uniqueCities = $woningHuis->pluck('city')->unique(); // Selecteer unieke steden
                    ?>
                    @foreach ($uniqueCities as $city)
                    <option value="{{ $city }}" {{ $city == $filterGemente ? 'selected' : '' }}>{{ $city }}</option>
                    @endforeach
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

                <input type="text" placeholder="min-prijs" name="minprice">
                <input type="text" placeholder="max-prijs" name="maxprice">

            </div>
        </li>
        <li>
            <button class=" product__mini__list__btn " type=" submit">Wis zoeklijsten</button>
            </form>
        </li>
    </ul>
</div>

<ul class="products">
    @foreach ($woningHuis as $product)
    <li class="product">
        <div class="product__foto">
            <div class="hiddenknop">
                <a href="/woning/{{$product->id }}"> Klik voor meer info 

            </div>
            <img src="{{ $product->image }}">
            <p class="product--overflo">
                {{ $product->nieuwTypes->name }}
            </p>
            </a>


            <div class="product__button">
                <button>
                    <svg class="w-8 h-8 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                    </svg>

                </button>
            </div>
        </div>
        <div class="product__price">
            <span class="max-w-72 min-h-16">
                <?php echo $product->city; ?> <?php echo $product->address; ?>
            </span>
            <span>€ <?php echo $product->price; ?></span>
        </div>
        <div class="product__info min-h-32">
            <h3>
                <?php echo $product->title; ?>
            </h3>
            <p>
                <?php echo $product->subtitle; ?>
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
                    <?php echo $product->rooms; ?> kamers
                </span>

            </li>
            <li>

                <span class="flex gap-2">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7.833 2c-.507 0-.98.216-1.318.576A1.92 1.92 0 0 0 6 3.89V21a1 1 0 0 0 1.625.78L12 18.28l4.375 3.5A1 1 0 0 0 18 21V3.889c0-.481-.178-.954-.515-1.313A1.808 1.808 0 0 0 16.167 2H7.833Z" />
                    </svg>

                    <?php echo $product->refnummer; ?> ref
                </span>
            </li>
            <li>
                <span class="flex gap-2">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H4m0 0v4m0-4 5 5m7-5h4m0 0v4m0-4-5 5M8 20H4m0 0v-4m0 4 5-5m7 5h4m0 0v-4m0 4-5-5" />
                    </svg><?php echo $product->size; ?> m²
                </span>
            </li>
        </ul>
    </li>
    @endforeach
</ul>

<div class="px-4 py-8 flex justify-center product__pagination">
    {{ $woningHuis->links() }}
</div>

@endsection