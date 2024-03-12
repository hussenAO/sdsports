<?php
require 'config.php';
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM logreg WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0) {
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            echo "<script> alert('login successful'); window.location.href='../index.html'; </script>";
            exit; // Make sure to exit after redirection
        } else {
            echo "<script> alert('Password incorrect'); </script>";
        }
    } else {
        echo "<script> alert('Username or email not found'); </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/style1.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.html"><img src="../assets/SDLOGO.png" alt="SD Logo"></a></li>
                <li><a href="../index.html">Home</a></li>
                <li class="dropdown">
                <a href="../html/producten.html" class="dropbtn">Alle Producten</a>
                <div class="dropdown-content">
                    <a href="../html/basketbal.html">Basketbal schoenen</a>
                    <a href="../html/voetbal.html">Voetbal schoenen</a>
                    <a href="../html/running.html">Ren schoenen</a>
                </div>
             </li>
                <li><a href="../html/winkelwagen.html">Mijn winkelmand</a></li>
                <li><a href="index.php">Inloggen</a></li>
            </ul>
        </nav>
    </header>
    <div class="body">
  <fieldset>
    <legend>Log-In</legend>
    <form class="" action="" method="post" autocomplete="off">
        <i class="fas fa-sign-in-alt"></i><br>
        <label for="usernameemail">username :</label>
        <input type="text" name="usernameemail" id="usernameemail" required value=""><br>
        <label for="password">password :</label>
        <input type="password" name="password" id="password" required value=""><br>
        <button type="submit" name="submit">log in</button>
          <div class="reg"><a href="registration.php">account maken</a></div>
    </form>
    </fieldset>
    <br>
</div>
</body>
</html>