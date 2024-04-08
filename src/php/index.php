<?php
/*
Naam script     : profile.php
Omschrijving    : Toont het profiel van de ingelogde gebruiker.
Auteur          : Hussen Brasco Dominik
Project         : Periode 3
Aanmaakdatum    : 2 februari 2024
*/

require 'config.php'; // Inclusief configuratie voor databaseverbinding

// Controleer of er een actieve sessie is met een gebruikers-ID
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM logreg WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    // Stuur gebruiker terug naar het inlogscherm als er geen sessie actief is
    header("location: login.php");
    exit; // Zorg ervoor dat er geen code meer wordt uitgevoerd na de doorverwijzing
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Profiel</title>
    <link rel="icon" href="../assets/favicon.png" type="image/x-icon">
</head>
<body>
    <h1>Welcome <?php echo $row["name"]; ?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>
