<!-- Voeg de benodigde CSS-bestanden toe -->
<link rel="stylesheet" href="{{ asset('css/splide.min.css') }}">

<div class="detail__foto">
    <div class="splide">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach($images as $image)
                    <li class="splide__slide">
                        <img src="{{ $image }}" alt="Slide">
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<!-- Voeg de benodigde JavaScript-bestanden toe -->
<script src="{{ asset('js/splide.min.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('.splide', {
            type: 'slide',
            autoplay: true,
            interval: 3000, // Stel de autoplay-interval in (optioneel)
            arrows: true, // Toon navigatiepijlen (optioneel)
            pagination: false // Verberg paginering (optioneel)
        }).mount();
    });
</script>
