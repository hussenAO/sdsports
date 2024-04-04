<?php
// Start de sessie
session_start();

// Maak de sessievariabele ongedaan
unset($_SESSION['login']);

// Stuur de gebruiker terug naar de hoofdpagina
header('Location: ../index.php');
exit;

require'config.php';
$_SESSION = [];
session_unset();
session_destroy();
header("location: ../login.php")
?>