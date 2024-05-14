export const bereken = () => {
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

}