<?php
// Start de sessie
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SD Sports</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.php"><img src="../assets/SDLOGO.png" alt="SD Logo"></a></li>
                <li><a href="../index.php">Home</a></li>
                <li class="dropdown">
                    <a href="producten.php" class="dropbtn">Alle Producten</a>
                    <div class="dropdown-content">
                        <a href="basketbal.php">Basketbal schoenen</a>
                        <a href="voetbal.php">Voetbal schoenen</a>
                        <a href="running.php">Ren schoenen</a>
                    </div>
                 </li>
                 <p id="cart-icon">Winkelwagen</p>

                 <?php
// Controleer of de gebruiker is ingelogd
if (isset($_SESSION['login'])) {
    // Gebruiker is ingelogd, toon de uitlogknop
    echo '<li><a href="php/logout.php">Uitloggen</a></li>';
} else {
    // Gebruiker is niet ingelogd, toon de inlogknop
    echo '<li><a href="php/login.php">Inloggen</a></li>';
}
?>
                 <div id="search-icon"><i class="fas fa-search"></i></div>
                 <div class="container">
                     <input type="checkbox" id="toggle">
                 </div>
             </ul>
         </nav>
                    <!-- CART  -->
                    <div class="cart">
                        <h2 class="cart-title">Your Cart</h2>
        
                        <!-- CONTENT  -->
                        <div class="cart-content">
        
        
                        </div>
        
                        <!-- TOTAL   -->
                        <div class="total">
                            <div class="total-title">Total</div>
                            <div class="total-price">$0</div>
                        </div>
                        <!-- BUY BUTTON  -->
                        <button type="button" class="btn-buy">Buy Now</button>
                        <!-- CART CLOSE  -->
                        <i class='bx bx-x' id="cart-close"></i>
                    </div>
             </ul>
         </nav>
         <input type="text" id="searchBar" onkeyup="searchFunction()" placeholder="Search">

                    <ul id="myList">
                    <li><a href="producten.html">Producten</a></li>
                    <li><a href="basketbal.html">Basketbal</a></li>
                    <li><a href="running.html">Running</a></li>
                    <li><a href="voetbal.html">Voetbal</a></li>
                    <!-- Add more list items as needed -->
                    </ul>
                    <style>
                        #myList li {
                          display: none;
                        }
                      </style>
                      <script>
                        function showListItem(event) {
                          event.target.style.display = 'block';
                        }
                      </script>
                      <script>
                        function searchFunction() {
                          var input, filter, ul, li, a, i, txtValue;
                          input = document.getElementById('searchBar');
                          filter = input.value.toUpperCase();
                          ul = document.getElementById("myList");
                          li = ul.getElementsByTagName('li');
                        
                          for (i = 0; i < li.length; i++) {
                            a = li[i].getElementsByTagName("a")[0];
                            txtValue = a.textContent || a.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              li[i].style.display = "list-item"; // Show the list item if it matches
                            } else {
                              li[i].style.display = "none"; // Hide the list item if it doesn't match
                            }
                          }
                        }
                        </script>
                        <script>
                            document.getElementById('search-icon').addEventListener('click', function() {
                              var searchBar = document.getElementById('searchBar');
                              if (searchBar.style.display === 'none') {
                                searchBar.style.display = 'block';
                              } else {
                                searchBar.style.display = 'none';
                              }
                            });
                            </script>
     </header>
     <video autoplay muted loop width="100%">
        <source src="../assets/commercial.mp4">
     </video>
     <hr>
     <hr>
    <main>
        <div class="card">
            <div class="shop-content">
    
                <div class="product-box">
                    <img src="../assets/running1.jpg" alt="" class="product-img">
                    <h2 class="product-title">Nike Running 3D</h2>
                    <span class="product-price">$79.50</span> 
                </div>
        </div> <br> <button class="add-cart">Add to cart</button>
  
    </div>
    <div class="card">
        <div class="shop-content">
                <div class="product-box">
                <img src=" ../assets/running2.jpg"alt="" class="product-img">
                <h2 class="product-title"> Asics Runner 1</h2>
                <span class="product-price">$59.50</span> 
            </div>
    </div> <br> <button class="add-cart">Add to cart</button>

</div>
<div class="card">
    <div class="shop-content">

        <div class="product-box">
            <img src="../assets/running3.jpg"alt="" class="product-img">
            <h2 class="product-title"> naKed slip on runner</h2>
            <span class="product-price">$120,99</span> 
        </div>
</div> <br> <button class="add-cart">Add to cart</button>

</div>
<div class="card">
    <div class="shop-content">
    
        <div class="product-box">
            <img src="../assets/Running1.jpeg"alt="" class="product-img">
            <h2 class="product-title">Nike Runner Neo </h2>
            <span class="product-price">$123,00</span> 
        </div>
</div> <br> <button class="add-cart">Add to cart</button>

</div>
       
<div class="card">
    <div class="shop-content">
    
        <div class="product-box">
            <img src="../assets/voetbal1.jpg"alt="" class="product-img">
            <h2 class="product-title">Nike Mercurial Vapor </h2>
            <span class="product-price">$150,00</span> 
            <p class="discount"><b><del>$249</del></b></p>   
        </div>
</div> <br> <button class="add-cart">Add to cart</button>

</div>
<div class="card">
    <div class="shop-content">
    
        <div class="product-box">
            <img src="../assets/voetbal4.jpg"alt="" class="product-img">
            <h2 class="product-title">Nike Mercurial Superfly</h2>
            <span class="product-price">$190,00</span> 
        </div>
</div> <br> <button class="add-cart">Add to cart</button>

</div>
<div class="card">
    <div class="shop-content">
    
        <div class="product-box">
            <img src="../assets/voetbalironman.jpg"alt="" class="product-img">
            <h2 class="product-title">Nike X Marvel Ironman</h2>
            <span class="product-price">$299,00</span> 
        </div>
</div> <br> <button class="add-cart">Add to cart</button>

</div>
<div class="card">
    <div class="shop-content">
    
        <div class="product-box">
            <img src="../assets/voetbal7-PhotoRoom.png-PhotoRoom.png"alt="" class="product-img">
            <h2 class="product-title">Nike Mercurial White Purple</h2>
            <span class="product-price">$350,00</span> 
        </div>
</div> <br> <button class="add-cart">Add to cart</button>

</div>
             
<div class="card">
    <div class="shop-content">
    
        <div class="product-box">
            <img src="../assets/Basketbal1.jpg"alt="" class="product-img">
            <h2 class="product-title">Air Jordan XX9</h2>
            <span class="product-price">$225,00</span> 
            <p class="discount"><b><del>$249</del></b></p> 
        </div>
</div> <br> <button class="add-cart">Add to cart</button>

</div>    

<div class="card">
    <div class="shop-content">
    
        <div class="product-box">
            <img src="../assets/Basketbal2.jpg"alt="" class="product-img">
            <h2 class="product-title">Air Jordan retro 7</h2>
            <span class="product-price">$145,00</span> 
        </div>
</div> <br> <button class="add-cart">Add to cart</button>

</div>
<div class="card">
    <div class="shop-content">
    
        <div class="product-box">
            <img src="../assets/Basketbal3.jpg"alt="" class="product-img">
            <h2 class="product-title">Air Jordan XX3</h2>
            <span class="product-price">$189,99</span> 
        </div>
</div> <br> <button class="add-cart">Add to cart</button>

</div>
<div class="card">
    <div class="shop-content">
    
        <div class="product-box">
            <img src="../assets/basketbal4.jpg"alt="" class="product-img">
            <h2 class="product-title">Nike Kyrie 4 Triple Black</h2>
            <span class="product-price">$123,00</span> 
        </div>
</div> <br> <button class="add-cart">Add to cart</button>

</div>   
         
        </main>
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h4>Over ons</h4>
                <p>Welkom bij SDsports, SDsports bevat al jou SportDesires. Onze webwinkel is sinds kort geopend en wij hebben een groeiende selectie van limited of moeilijk te verkrijgen sportschoenen. Zie je een product hier niet staat terwijl jij denkt dat het wel daar zou moeten staan? laat het weten op onze sociale media of stuur een mail. infoSD@gmail.com</p>
            </div>

            <div class="footer-section">
                <h4>Volg ons op</h4>
                <h5>Facebook<h5>
                <h5>Twitter<h5>
                <h5>Instagram<h5>
            </div>
            
            <div class="footer-section">
                <h4>Alle producten</h4>
                <a href="producten.html">Basketbal schoenen</a>
                <a href="producten.html">Voetbal schoenen</a>
                <a href="producten.html">Ren schoenen</a>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2023 SD Sports. All rights reserved.</p>
        </div>
        <script src="../JS/script.js"></script>
        <script src="../JS/cart.js"></script>
    </footer>
</body>