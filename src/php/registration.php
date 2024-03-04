
<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header(("location: index.php"));
}
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM logreg WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('username or email has already taken'); </script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO logreg VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn,$query);
            echo
            "<script> alert('registration succes'); </script>";

        }
        else{
            echo
            "<script> alert('password does not match'); </script>";

        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login1.css">
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
    <form class="" action="" method="post" autocomplete="off">
        <h2>registration</h2>
        <label for="name">Name :</label>
        <input type="text" name="name" id="name" required value=""><br>
        <label for="username">Username :</label>
        <input type="text" name="username" id="username" required value=""><br>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required value=""><br>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" required value=""><br>
        <label for="confirmpassword">Confirm Password :</label>
        <input type="password" name="confirmpassword" id="confirmpassword" required value=""><br>
        <button type="submit" name="submit">registreer</button>
        <div class="reg"> <a href="login.php">log-in</a></div>
    </form>
    <br>
  
</fieldset>
</div>
</body>
</html>