<?php
/*
Naam script     : logout.php
Omschrijving    : Logt de gebruiker uit door de sessievariabele te verwijderen en stuurt de gebruiker terug naar de hoofdpagina.
Auteur          : Hussen Brasco Dominik
Project         : Periode 3
Aanmaakdatum    : 2 februari 2024
*/

// Start de sessie
session_start();

// Maak de sessievariabele 'login' ongedaan (uitloggen)
unset($_SESSION['login']);

// Stuur de gebruiker terug naar de hoofdpagina (index.php)
header('Location: ../index.php');
exit; // Zorg ervoor dat er geen code meer wordt uitgevoerd na het doorsturen
?>
