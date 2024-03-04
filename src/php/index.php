<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM logreg WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}   
 else{
    header("location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>welcome <?php echo  $row["name"];?> </h1>
    <a href="logout.php">logout</a>
</body>
</html>