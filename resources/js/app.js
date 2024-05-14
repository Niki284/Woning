import './bootstrap';
// Default theme
import '@splidejs/splide/css';

// or other themes
import '@splidejs/splide/css/skyblue';
import '@splidejs/splide/css/sea-green';

// or only core styles
import '@splidejs/splide/css/core';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// Get dialog elements
const woningDialog = document.getElementById("woningDialog");
const woningTypeDialog = document.getElementById("woningTypeDialog");
const bouwTypeDialog = document.getElementById("bouwTypeDialog");
const nieuwTypeDialog = document.getElementById("nieuwTypeDialog");
const voorzieningDialog = document.getElementById("voorzieningDialog");
const makelaarDialog = document.getElementById("makelaarDialog");


// Get buttons to show dialogs
const showWoningButton = document.getElementById("showWoningDialog");
const showWoningTypeButton = document.getElementById("showWoningTypeDialog");
const showBouwTypeDialog = document.getElementById("showBouwTypeDialog");
const showNieuwTypeDialog = document.getElementById("showNieuwTypeDialog");
const showVoorzieningDialog = document.getElementById("showVoorzieningDialog");
const showMakelaarDialog = document.getElementById("showMakelaarDialog");

// Add event listeners to buttons
showWoningButton.addEventListener("click", () => {
    woningDialog.showModal();
});

showWoningTypeButton.addEventListener("click", () => {
    woningTypeDialog.showModal();
});

// Add event listeners to close buttons within dialogs
woningDialog.querySelector("button").addEventListener("click", () => {
    woningDialog.close();
});

woningTypeDialog.querySelector("button").addEventListener("click", () => {
    woningTypeDialog.close();
});

showBouwTypeDialog.addEventListener("click", () => {
    bouwTypeDialog.showModal();
});
bouwTypeDialog.querySelector("button").addEventListener("click", () => {
    bouwTypeDialog.close();
});

showWoningTypeButton.addEventListener("click", () => {
    woningTypeDialog.showModal();
});

// Add event listeners to close buttons within dialogs
showNieuwTypeDialog.addEventListener("click", () => {
    nieuwTypeDialog.showModal();
});

nieuwTypeDialog.querySelector("button").addEventListener("click", () => {
    nieuwTypeDialog.close();
});

// Add event listeners to close buttons within dialogs
showVoorzieningDialog.addEventListener("click", () => {
    voorzieningDialog.showModal();
});

voorzieningDialog.querySelector("button").addEventListener("click", () => {
    voorzieningDialog.close();
});

 
// Add event listeners to close buttons within dialogs
showMakelaarDialog.addEventListener("click", () => {
    makelaarDialog.showModal();
});

makelaarDialog.querySelector("button").addEventListener("click", () => {
    makelaarDialog.close();
});


