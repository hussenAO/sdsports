/*
Naam script     : themeToggle.js
Omschrijving    : Schakelt tussen lichte en donkere thema's wanneer er op een knop wordt geklikt.
Auteur          : hussen brasco dominik
Project         : periode 3
Aanmaakdatum    : 01-02-2024
*/

// Voeg een event listener toe aan het element met id "toggle"
document.getElementById("toggle").addEventListener("click", function(){
    // Selecteer het body-element en toggle de class "light-theme"
    document.getElementsByTagName('body')[0].classList.toggle("light-theme");
});
