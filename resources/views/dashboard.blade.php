<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}

            <ul class="list__render list__render--wrap">
                <li>
                    <h2 class="text-2xl font-semibold">Woning</h2>
                    <!-- <a href="/dashboard/woning/create">woeg woning</a> 
                    -->
                    <dialog id="woningDialog">
                        <div class="btn-close">
                            <button autofocus>Close</button>
                        </div>

                        <div class="forms">
                            <div class="formmini">
                                <h1>Voeg hier jouw product toe</h1>

                                <form action="/dashboard/woning/store" multiple enctype="multipart/form-data" method="POST" class="form__categorie">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle">Subtitle</label>
                                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Subtitle">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Prijs</label>
                                        <input type="text" class="form-control" id="price" name="price" placeholder="price">
                                    </div>
                                    <div class="form-group">
                                        <label for="beschrijving">Beschrijving</label>
                                        <input type="text" class="form-control" id="beschrijving" name="description" placeholder="Beschrijving">
                                    </div>
                                    <div class="form-group">
                                        <label for="city">Gemente</label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="Gemente">
                                    </div>
                                    <div class="form-group">
                                        <label for="postcode">Postcode</label>
                                        <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Straat</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Straat">
                                    </div>
                                    <div class="form-group">
                                        <label for="rooms">Rooms</label>
                                        <input type="text" class="form-control" id="rooms" name="rooms" placeholder="Rooms">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" id="image" name="image" placeholder="Image">
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" id="images" multiple name="images[]" placeholder="Images">
                                    </div>

                                    <div class="form-group">
                                        <label for="grootte">Grootte</label>
                                        <input type="text" class="form-control" id="size" name="size" placeholder="Grootte">
                                    </div>
                                    <div class="form-group">
                                        <label for="grootte">Refnummer</label>
                                        <input type="text" class="form-control" id="refnummer" name="refnummer" placeholder="refnummer">
                                    </div>

                                    <select name="woning_type_id" id="">
                                        @foreach($woning_types as $woning_type)
                                        <option value="{{$woning_type->id}}">{{$woning_type->name}}</option>
                                        @endforeach
                                    </select>

                                    <select name="bouwtype_id" id="">
                                        @foreach($bouwtypes as $bouwtype)
                                        <option value="{{$bouwtype->id}}">{{$bouwtype->name}}</option>
                                        @endforeach
                                    </select>

                                    <select name="nieuwtype_id" id="">
                                        @foreach($nieuwTypes as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                        @endforeach
                                    </select>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Voorziningen:</label>
                                        <div class="col-md-8">
                                            @foreach ($voorziningen as $voorziening)
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" name="voorziening[]" value="{{ $voorziening->id }}" class="form-check-input p-2">
                                                <label class="form-check-label p-1">{{ $voorziening->voorzining }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="makelaar_id">Makelaar</label>
                                        <select name="makelaar_id" id="makelaar_id" class="form-control">
                                            <option value="">Selecteer een makelaar</option>
                                            @foreach($makelaars as $makelaar)
                                            <option value="{{ $makelaar->id }}">{{ $makelaar->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="form__categorie__btn">Add</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                    <button id="showWoningDialog" class="py-2 text-blue-300 hover:text-blue-400">
                        Voeg Woning
                    </button>
                </li>
                <li>
                    <h2 class="text-2xl font-semibold flex-1 flex-col">Woning Type</h2>
                    <dialog id="woningTypeDialog">
                        <div class="btn-close">
                            <button autofocus>Close</button>
                        </div>
                        <div class="forms">
                            <div class="formmini">
                                <h1>Voeg hier woningtype toe</h1>

                                <form action="/dashboard/woningType/store" enctype="multipart/form-data" method="POST" class="form__categorie">
                                    @csrf
                                    <div class="form-group">
                                        <label for="WoningType">WoningType</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="WoningType">
                                    </div>
                                    <button type="submit" class="form__categorie__btn">Add</button>
                                </form>
                            </div>
                        </div>
                        <div class="alltype">
                            <a href="/dashboard/woningType">all woning type</a>
                        </div>
                    </dialog>
                    <button id="showWoningTypeDialog" class="py-2 text-blue-300 hover:text-blue-400">
                        Voeg woningType
                    </button>
                </li>
                <li>
                    <h2 class="text-2xl font-semibold">Bouw Type</h2>
                    <dialog id="bouwTypeDialog">
                        <div class="btn-close">
                            <button autofocus>Close</button>
                        </div>
                        <div class="forms">
                            <div class="formmini">
                                <h1>Voeg hier jouw bouwtype toe</h1>

                                <form action="/dashboard/bouwtype/store" method="POST" class="form__categorie">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Bouw type</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Bouw Type">
                                    </div>
                                    <button type="submit" class="form__categorie__btn">Add</button>

                                </form>

                            </div>
                        </div>
                        <div class="alltype">
                            <a href="/dashboard/bouwtype">all bouw type</a>
                        </div>
                    </dialog>
                    <button id="showBouwTypeDialog" class="py-2 text-blue-300 hover:text-blue-400">
                        Voeg BouwType
                    </button>
                </li>
                <li>
                    <h2 class="text-2xl font-semibold">Nieuw Type</h2>
                    <dialog id="nieuwTypeDialog">
                        <div class="btn-close">
                            <button autofocus>Close</button>
                        </div>
                        <div class="forms">
                            <div class="formmini">
                                <h1>Voeg hier jouw nieuwtype toe</h1>

                                <form action="/dashboard/nieuwtype/store" enctype="multipart/form-data" method="POST" class="form__categorie">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nieuw type</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nieuw Type">
                                    </div>
                                    <button type="submit" class="form__categorie__btn">Add</button>
                                </form>
                            </div>
                        </div>
                        <div class="alltype">
                            <a href="/dashboard/nieuwtype">all nieuw type</a>
                        </div>
                    </dialog>
                    <button id="showNieuwTypeDialog" class="py-2 text-blue-300 hover:text-blue-400">
                        Voeg NieuwType
                    </button>
                </li>


                <li>
                    <h2 class="text-2xl font-semibold">Nieuw Voorziening</h2>
                    <dialog id="voorzieningDialog">
                        <div class="btn-close">
                            <button autofocus>Close</button>
                        </div>
                        <div class="forms">
                            <div class="formmini">
                                <h1>Voeg hier jouw voorziening toe</h1>

                                <form action="/dashboard/voorziningen/store" enctype="multipart/form-data" method="POST" class="form__categorie">
                                    @csrf
                                    <div class="form-group">
                                        <label for="voorzining">Voorzining</label>
                                        <input type="text" class="form-control" id="voorzining" name="voorzining" placeholder="Nieuw voorzining">
                                    </div>
                                    <button type="submit" class="form__categorie__btn">Add</button>
                                </form>
                            </div>
                        </div>
                        <div class="alltype">
                            <a href="/dashboard/voorziningen">all voorzieningen</a>
                        </div>
                    </dialog>
                    <button id="showVoorzieningDialog" class="py-2 text-blue-300 hover:text-blue-400">
                        Voeg Voorziening
                    </button>
                </li>

                <li>
                    <h2 class="text-2xl font-semibold">Makelaar</h2>
                    <dialog id="makelaarDialog">
                        <div class="btn-close">
                            <button autofocus>Close</button>
                        </div>
                        <div class="forms">
                            <div class="formmini">
                                <h1>Voeg hier jouw makelaar toe</h1>

                                <form action="/dashboard/makelaar/store" enctype="multipart/form-data" method="POST" class="form__categorie">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Makelaar</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Makelaar name">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Makelaar lastname">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Makelaar phone">
                                    </div>

                                    <div class="form-group">
                                        <label for="reference">Reference</label>
                                        <input type="text" class="form-control" id="reference" name="reference" placeholder="Makelaar reference">
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Foto</label>
                                        <input type="file" class="form-control" id="image" name="image" placeholder="Makelaar image">
                                    </div>
                                    <button type="submit" class="form__categorie__btn">Add</button>
                                </form>
                            </div>
                        </div>
                        <div class="alltype">
                            <a href="/dashboard/makelaar">all Makelaars</a>
                        </div>
                    </dialog>
                    <button id="showMakelaarDialog" class="py-2 text-blue-300 hover:text-blue-400">
                        Voeg Makelaar
                    </button>
                </li>



            </ul>
        </h2>
    </x-slot>
    <div class="sitebare">
        <div class="sitebare__content">

            <!-- Modal -->


        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h2 class="text-2xl font-semibold">Woningen</h2>
                            <ul class="products">
                                <?php foreach ($woningHuis as $product) : ?>
                                    <li class="product">
                                        <div class="product__foto">
                                            <div class="hiddenknop">
                                                <a href="/dashboard/woning/{{$product->id }}"> Klik voor meer info

                                            </div>
                                            <img src="{{ $product->image }}">
                                            <p class="product--overflo">
                                                {{ $product->nieuwTypes->name }}
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
                                            <span class="max-w-60 min-h-16">
                                                {{ $product->city }} {{ $product->address }}
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


                                        <ul class="product__mini__list">
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
                                        </a>
                                        <div class="flex space-x-4">
                                            <a href="/dashboard/woning/edit/{{$product->id}}" class="bg-green-700 text-white p-2 hover:bg-green-500">Bijwerk woning</a>
                                            <form method="post" action="/dashboard/{{$product->id}}">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="_method" value="delete">
                                                <button type="submit" class="bg-red-700 text-white p-2 hover:bg-red-500">Verwijder woning</button>
                                            </form>
                                        </div>
                                        <!-- <a href="/dashboard/woning/edit/{{$product->id}}"> Edit Woning</a> -->

                                    </li>
                                <?php endforeach;
                                ?>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
</x-app-layout>