
<?php
/*
Naam script     : register.php
Omschrijving    : Verwerkt het registratieformulier voor nieuwe gebruikers.
Auteur          : hussen dominik brasco
Project         : peridode 3
Aanmaakdatum    : 01-02-2024
*/
require 'config.php'; // Inclusief configuratie voor databaseverbinding

// Controleer of de gebruiker al is ingelogd (op basis van sessie-id) en stuur door naar index.php indien waar
if(!empty($_SESSION["id"])){
    header(("location: index.php"));
}

// Controleer of het registratieformulier is ingediend
if(isset($_POST["submit"])){
    // Haal gegevens op uit het formulier
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    // Controleer of gebruikersnaam of e-mail al bestaat in de database
    $duplicate = mysqli_query($conn, "SELECT * FROM logreg WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        // Toon melding als gebruikersnaam of e-mail al bestaat
        echo "<script> alert('Gebruikersnaam of e-mail is al in gebruik'); </script>";
    } else {
        // Controleer of het wachtwoord overeenkomt met het bevestigde wachtwoord
        if($password == $confirmpassword){
            // Voeg nieuwe gebruikersgegevens toe aan de database
            $query = "INSERT INTO logreg VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn, $query);
            // Toon succesmelding
            echo "<script> alert('Registratie succesvol'); </script>";
        } else {
            // Toon melding als wachtwoorden niet overeenkomen
            echo "<script> alert('Wachtwoorden komen niet overeen'); </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Registratie</title>
</head>
<body>
    <header>
        <!-- Navigatiebalk -->
        <nav>
            <ul>
                <li><a href="../index.php"><img src="../assets/SDLOGO.png" alt="SD-logo"></a></li>
                <li><a href="../index.php">Home</a></li>
                <li class="dropdown">
                    <a href="../html/producten.php" class="dropbtn">Alle Producten</a>
                    <div class="dropdown-content">
                        <a href="../html/basketbal.php">Basketbalschoenen</a>
                        <a href="../html/voetbal.php">Voetbalschoenen</a>
                        <a href="../html/running.php">Hardloopschoenen</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    
    <div class="body">
        <!-- Registratieformulier -->
        <fieldset>
            <legend>Registratie</legend>
            <form class="" action="" method="post" autocomplete="off">
                <label for="name">Naam :</label>
                <input type="text" name="name" id="name" required><br>
                <label for="username">Gebruikersnaam :</label>
                <input type="text" name="username" id="username" required><br>
                <label for="email">E-mail :</label>
                <input type="email" name="email" id="email" required><br>
                <label for="password">Wachtwoord :</label>
                <input type="password" name="password" id="password" required><br>
                <label for="confirmpassword">Bevestig Wachtwoord :</label>
                <input type="password" name="confirmpassword" id="confirmpassword" required><br>
                <button type="submit" name="submit">Registreer</button>
                <div class="reg"> <a href="login.php">Log-in</a></div>
            </form>
        </fieldset>
    </div>
</body>
</html>
