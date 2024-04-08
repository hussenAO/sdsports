<?php
/*
Naam script     : login.php
Omschrijving    : Verwerkt het inloggen van gebruikers met gebruikersnaam of e-mail en wachtwoord.
Auteur          : Hussen Brasco Dominik
Project         : Periode 3
Aanmaakdatum    : 2 februari 2024
*/

require 'config.php'; // Inclusief configuratie voor databaseverbinding

// Controleer of het formulier is ingediend
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    
    // Zoek de gebruiker op basis van gebruikersnaam of e-mail in de database
    $result = mysqli_query($conn, "SELECT * FROM logreg WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    
    // Controleer of de gebruiker is gevonden
    if(mysqli_num_rows($result) > 0) {
        // Controleer of het opgegeven wachtwoord overeenkomt met het opgeslagen wachtwoord
        if($password == $row["password"]){
            // Start de sessie en sla de inlogstatus op
            session_start();
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            
            // Toon melding en stuur de gebruiker door naar de hoofdpagina na succesvol inloggen
            echo "<script> alert('Inloggen succesvol'); window.location.href='../index.php'; </script>";
            exit; // Zorg ervoor dat er geen verdere code wordt uitgevoerd na het doorsturen
        } else {
            // Toon melding als het wachtwoord onjuist is
            echo "<script> alert('Wachtwoord incorrect'); </script>";
        }
    } else {
        // Toon melding als gebruikersnaam of e-mail niet is gevonden
        echo "<script> alert('Gebruikersnaam of e-mail niet gevonden'); </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Log-In</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.php"><img src="../assets/SDLOGO.png" alt="SD Logo"></a></li>
                <li><a href="../index.php">Home</a></li>
                <li class="dropdown">
                    <a href="../html/producten.php" class="dropbtn">Alle Producten</a>
                    <div class="dropdown-content">
                        <a href="../html/basketbal.php">Basketbal schoenen</a>
                        <a href="../html/voetbal.php">Voetbal schoenen</a>
                        <a href="../html/running.php">Ren schoenen</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <div class="body">
        <fieldset>
            <legend>Log-In</legend>
            <form class="" action="" method="post" autocomplete="off">
                <i class="fas fa-sign-in-alt"></i><br>
                <label for="usernameemail">Gebruikersnaam of E-mail :</label>
                <input type="text" name="usernameemail" id="usernameemail" required><br>
                <label for="password">Wachtwoord :</label>
                <input type="password" name="password" id="password" required><br>
                <button type="submit" name="submit">Log in</button>
                <div class="reg"><a href="registration.php">Account maken</a></div>
            </form>
        </fieldset>
    </div>
</body>
</html>
