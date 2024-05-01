@extends('layouts.app')

@section('content')

<div class="product__filter">
    <ul class="product__filter__list">
        <li>
            <form method="get" action="/woning">

            <select name="filterGemente" id="filterGemente">
                <option value="">-- gemeente -- </option>

                @foreach ($woningHuis as $gemeente)
                    <option value="{{$gemeente->city}}">{{$gemeente->city}}</option>
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
            
                <input type="text" placeholder="price" name="search" value="{{ $search }}">

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
            <a href="/dashboard/woning/{{$product->id }}">
                <div class="product__foto">
                    <img src="{{ $product->image }}">
                    <div class="product__button">
                        <button>
                            <i class="fas fa-heart" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="product__price">
                    <span>
                        <?php echo $product->city; ?> <?php echo $product->address; ?>
                    </span>
                    <span>€ <?php echo $product->price; ?></span>
                </div>
                <div class="product__info">
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
                        <i class="fas fa-bed" aria-hidden="true"></i>
                        <span>
                            <?php echo $product->rooms; ?> kamers
                        </span>

                    </li>
                    <li>
                        <i class="fas fa-bookkmark" aria-hidden="true"></i>
                         <span>
                            <?php echo $product->refnummer; ?> ref
                        </span>
                    </li>
                    <li>
                    <i class="fas fa-expand" aria-hidden="true"></i>
                       <span>  
                        <?php echo $product->size; ?> m²
                        </span>
                    </li>
                </ul>
            </a>
        </li>
    @endforeach
</ul>

    <a href="/"></a>
</ul>
</div>

@endsection