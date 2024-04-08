<?php
/*
Naam script     : config.php
Omschrijving    : Configuratiebestand voor het starten van een sessie en het maken van een databaseverbinding.
Auteur          : Hussen Brasco Dominik
Project         : SDsports
Aanmaakdatum    : [Aanmaakdatum]
*/

// Start de sessie
session_start();

// Maak een verbinding met de database
$conn = mysqli_connect("localhost", "root", "", "SDsports");

?>
